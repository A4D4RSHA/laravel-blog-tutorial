<div class="card mb-4">
    <div class="card-header">
        <span style="font-weight: bold">Search</span>
    </div>
    <div class="card-body">
        <form action="{{ route('search') }}" method="GET">

            <x-input
                field="search"
                text="Search Query"
                :required="true"
            />

            <button class="btn btn-primary" type="submit">
                Search
            </button>

        </form>
    </div>
</div>