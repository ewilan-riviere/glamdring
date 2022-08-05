<div>
    <x-dashboard.title title="Projects" />
    <x-dashboard.entities-list>
        @foreach ($projects as $project)
            <x-project.card :project="$project" />
        @endforeach
    </x-dashboard.entities-list>
</div>
