@extends('layouts.app')

@section('content')
<div class="card">
  <h2>📑 Plagiarism Report</h2>

  {{-- Notifications --}}
  @if(session('ok'))
    <div class="card" style="border-left:6px solid #22c55e;margin-bottom:12px">{{ session('ok') }}</div>
  @endif
  @if(session('err'))
    <div class="card" style="border-left:6px solid #ef4444;margin-bottom:12px">{{ session('err') }}</div>
  @endif

  @php 
    $results = json_decode($report->result, true); 
    $score = $report->similarity_score ?? 0;
  @endphp

  {{-- Overall Result --}}
  <div style="margin-bottom:20px">
    <strong>Plagiarism Check Result:</strong>
    @if(!empty($results['google_matches']))
      <span style="color:#dc2626;font-weight:bold">❌ Plagiarism Detected</span>
    @else
      <span style="color:#16a34a;font-weight:bold">✅ No Plagiarism Found</span>
    @endif
  </div>

  {{-- Progress Chart --}}
  <div style="display:flex;align-items:center;gap:16px;margin:20px 0">
    <div style="width:100px;height:100px">
      <canvas id="scoreChart"></canvas>
    </div>
    <div>
      <strong>Plagiarism Score:</strong>
      <span style="font-size:18px;font-weight:bold;color:{{ $score > 40 ? '#dc2626' : '#16a34a' }}">
        {{ $score }}%
      </span>
    </div>
  </div>

  {{-- Matched Sources --}}
  <h4>🔎 Matched Sources</h4>
  <ul style="list-style:none;padding-left:0">
    @forelse($results['google_matches'] ?? [] as $sentence => $sources)
      <li style="margin-bottom:12px">
        <blockquote style="font-style:italic;color:#374151;background:#f9fafb;padding:8px 12px;border-left:4px solid #6366f1;border-radius:4px">
          {{ $sentence }}
        </blockquote>
        <ul style="margin-top:6px;padding-left:20px">
          @foreach($sources as $s)
            <li>
              <a href="{{ $s['link'] }}" target="_blank" style="color:#2563eb;text-decoration:underline">
                {{ $s['title'] }}
              </a>
            </li>
          @endforeach
        </ul>
      </li>
    @empty
      <li class="muted">No external matches found 🎉</li>
    @endforelse
  </ul>

  <div style="margin-top:20px">
    <a class="btn secondary" href="{{ route('assignments.index') }}">⬅ Back to Assignments</a>
  </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('scoreChart').getContext('2d');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Plagiarized', 'Unique'],
      datasets: [{
        data: [{{ $score }}, {{ 100 - $score }}],
        backgroundColor: [
          '{{ $score > 40 ? "#dc2626" : "#16a34a" }}',
          '#e5e7eb'
        ],
        borderWidth: 0
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: '70%',
      plugins: { legend: { display: false } }
    },
    plugins: [{
      id: 'centerText',
      beforeDraw(chart) {
        const {ctx, chartArea: {top, bottom, left, right}} = chart;
        ctx.save();
        const text = "{{ $score }}%";
        ctx.font = "bold 16px sans-serif";
        ctx.fillStyle = "#111";
        ctx.textAlign = "center";
        ctx.textBaseline = "middle";
        ctx.fillText(text, (left + right) / 2, (top + bottom) / 2);
        ctx.restore();
      }
    }]
  });
</script>
@endsection
