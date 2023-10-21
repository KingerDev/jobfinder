<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job>
        <p class="text-m text-slate-500 mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>

        @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">
                Apply
            </x-link-button>
        @else
            <p class="text-center text-sm font-medium text-slate-800">
                You have already applied for this job
            </p>
        @endcan
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{ $job->employer->company_name }} Jobs
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherJob)
                <a href="{{ route('jobs.show', $otherJob) }}">
                    <div class="mb-4 flex justify-between px-4 py-2 border-r-4 rounded hover:bg-slate-200">
                        <div>
                            <div class="text-slate-700">
                                {{ $otherJob->title }}
                            </div>
                            <div class="text-xs">
                                {{ $otherJob->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="text-xs">
                            ${{ number_format($otherJob->salary) }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </x-card>
</x-layout>
