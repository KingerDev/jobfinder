<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

    <div class="mb-8 text-right">
        <x-link-button :href="route('my-jobs.create')">
            Add new job offer
        </x-link-button>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text-xs text-slate-500">
                <h3 class="text-slate-800 text-md font-medium mb-1.5">Job applications:</h3>
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h6>{{ $application->user->name }}</h6>
                            <p>
                                Applied {{ $application->created_at->diffForHumans() }}
                            </p>
                            <span class="text-slate-900">
                                Download CV
                            </span>
                        </div>

                        <span>
                            {{ number_format($application->expected_salary) }} €
                        </span>
                    </div>
                @empty
                    <p>No applications yet</p>
                @endforelse

                <div class="flex space-x-2">
                    <x-link-button :href="route('my-jobs.edit', $job)">Edit job offer</x-link-button>
                    <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Delete job offer</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <p>No jobs here yet</p>
    @endforelse
</x-layout>
