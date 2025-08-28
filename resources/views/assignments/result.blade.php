{{-- resources/views/assignments/partials/result.blade.php --}}

<div class="row mb-4">
    <div class="col">
        <h2>Plagiarism Results: {{ $assignment->title ?? '' }}</h2>
        <p class="text-muted">Detailed analysis of your submitted content</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="dashboard-card stat-card">
            <div class="stat-number {{ $result['result']['score'] > 50 ? 'text-danger' : ($result['result']['score'] > 25 ? 'text-warning' : 'text-success') }}">
                {{ $result['result']['score'] ?? 0 }}%
            </div>
            <div class="stat-label">Plagiarism Score</div>
        </div>
    </div> 
    <div class="col-md-3">
        <div class="dashboard-card stat-card">
            <div class="stat-number">{{ $result['result']['sourceCounts'] ?? 0 }}</div>
            <div class="stat-label">Sources Found</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card stat-card">
            <div class="stat-number">{{ $result['result']['textWordCounts'] ?? 0 }}</div>
            <div class="stat-label">Total Words</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card stat-card">
            <div class="stat-number">{{ $result['result']['totalPlagiarismWords'] ?? 0 }}</div>
            <div class="stat-label">Plagiarized Words</div>
        </div>
    </div>
</div>

<!-- Text Analysis -->
<div class="row mb-4">
    <div class="col">
        <div class="dashboard-card">
            <h4>Text Analysis</h4>
            <div class="text-analysis-container">
                @if(isset($result['text']))
                    @php
                        $text = $result['text'];

                        // Highlight plagiarized indexes
                        if (isset($result['indexes'])) {
                            usort($result['indexes'], fn($a, $b) => $b['startIndex'] - $a['startIndex']);
                            foreach ($result['indexes'] as $index) {
                                $start = $index['startIndex'];
                                $end = $index['endIndex'];
                                $length = $end - $start;
                                $highlight = '<span class="highlight-plagiarism">' . substr($text, $start, $length) . '</span>';
                                $text = substr_replace($text, $highlight, $start, $length);
                            }
                        }

                        // Highlight similar words
                        if (isset($result['similarWords'])) {
                            usort($result['similarWords'], fn($a, $b) => $b['index'] - $a['index']);
                            foreach ($result['similarWords'] as $word) {
                                $index = $word['index'];
                                $wordText = $word['word'];
                                $length = strlen($wordText);
                                $highlight = '<span class="similar-word">' . $wordText . '</span>';
                                $text = substr_replace($text, $highlight, $index, $length);
                            }
                        }
                    @endphp
                    <div class="text-preview">
                        {!! nl2br($text) !!}
                    </div>

                    <div class="legend mt-3">
                        <span class="badge bg-danger me-2">Plagiarized Text</span>
                        <span class="badge bg-warning text-dark">Similar Words</span>
                    </div>

                @else
                    <p class="text-muted">No text available for analysis.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Sources -->
<div class="row mb-4">
    <div class="col">
        <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Sources ({{ count($result['sources'] ?? []) }})</h4>
                <span class="badge bg-primary">Total: {{ $result['result']['sourceCounts'] ?? 0 }}</span>
            </div>

            @if(isset($result['sources']) && count($result['sources']) > 0)
                <div class="sources-list">
                    @foreach($result['sources'] as $source)
                        <div class="source-item card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">
                                            @if($source['canAccess'] ?? false)
                                                <a href="{{ $source['url'] }}" target="_blank" class="text-primary text-decoration-underline fw-bold">
                                                    {{ $source['title'] ?? 'Untitled' }}
                                                </a>
                                            @else
                                                <span class="text-muted">
                                                    {{ $source['title'] ?? 'Untitled' }}
                                                </span>
                                            @endif

                                        </h6>
                                        <p class="mb-1 text-muted small">{{ $source['url'] }}</p>
                                        @if($source['description'] ?? false)
                                            <p class="mb-1 small">{{ Str::limit($source['description'], 200) }}</p>
                                        @endif
                                        <div class="d-flex flex-wrap gap-3 mt-2 small">
                                            <span class="text-muted">Score: <strong class="{{ $source['score'] > 50 ? 'text-danger' : ($source['score'] > 25 ? 'text-warning' : 'text-success') }}">{{ $source['score'] }}%</strong></span>
                                            <span class="text-muted">Plagiarism Words: <strong>{{ $source['plagiarismWords'] ?? 0 }}</strong></span>
                                            <span class="text-muted">Identical: <strong>{{ $source['identicalWordCounts'] ?? 0 }}</strong></span>
                                            <span class="text-muted">Similar: <strong>{{ $source['similarWordCounts'] ?? 0 }}</strong></span>
                                            @if(!empty($source['publishedDate']) && $source['publishedDate'] !== 'unknown')
                                                <span class="text-muted">Published: <strong>{{ \Carbon\Carbon::parse($source['publishedDate'])->format('M j, Y') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ms-3">
                                        @if($source['is_excluded'] ?? false)
                                            <span class="badge bg-secondary">Excluded</span>
                                        @endif
                                        @if($source['citation'] ?? false)
                                            <span class="badge bg-info">Citation</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h5>No sources found</h5>
                    <p class="text-muted">No matching sources were found for this content</p>
                </div>
            @endif
        </div>
    </div>
</div>

<form action="{{ route('submission.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- Store Original Assignment Text or File --}}
    <div class="mb-3">
        <label for="assignment_text" class="form-label">Assignment Text</label>
        <textarea class="form-control" id="assignment_text" name="assignment_text" rows="5" readonly>
            {{ $extractedText ?? '' }}
        </textarea>
    </div>

    @if(isset($uploadedFileName))
        <div class="mb-3">
            <label class="form-label">Uploaded File</label>
            <input type="text" class="form-control" value="{{ $uploadedFileName }}" readonly>
            <input type="hidden" name="uploaded_file" value="{{ $uploadedFileName }}">
        </div>
    @endif

    {{-- Plagiarism Results --}}
    <input type="hidden" name="plagiarism_score" value="{{ $result['result']['score'] ?? 0 }}">
    <input type="hidden" name="sources_found" value="{{ count($result['sources'] ?? []) }}">
    <input type="hidden" name="total_words" value="{{ $result['result']['textWordCounts'] ?? 0 }}">
    <input type="hidden" name="plagiarized_words" value="{{ $result['result']['totalPlagiarismWords'] ?? 0 }}">
    <input type="hidden" name="text_analysis" value="{{ nl2br($text) }}">
    <input type="hidden" name="title" value="{{ $assignment->title }}">
    

    {{-- Sources with Links --}}
    @if(isset($result['sources']) && count($result['sources']) > 0)
        @foreach($result['sources'] as $index => $source)
            <input type="hidden" name="sources[{{ $index }}][title]" value="{{ $source['title'] ?? 'Untitled' }}">
            <input type="hidden" name="sources[{{ $index }}][url]" value="{{ $source['url'] ?? '' }}">
        @endforeach
    @endif

    <button type="submit" class="btn btn-primary">Submit Assignment</button>
</form>




<style>
    .highlight-plagiarism {
        background-color: rgba(220, 53, 69, 0.1);
        border-bottom: 2px dotted #dc3545;
        padding: 2px 0;
    }
    .similar-word {
        background-color: rgba(255, 193, 7, 0.2);
        border-bottom: 1px dashed #ffc107;
        padding: 1px 0;
    }
    .text-preview {
        white-space: pre-wrap;
        line-height: 1.6;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 5px;
        max-height: 400px;
        overflow-y: auto;
    }
    .source-item {
        transition: transform 0.2s;
    }
    .source-item:hover {
        transform: translateY(-2px);
    }
</style>
