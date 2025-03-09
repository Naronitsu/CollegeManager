<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <div class="row">
            <div class="col">
                <form method="GET" action="{{ route('students.index') }}">
                    <div class="input-group mb-3">
                        <select name="college_id" id="filter_college_id" class="custom-select" onchange="this.form.submit()">
                            <option value="">Filter by College</option>
                            @foreach ($colleges as $id => $name)
                                <option value="{{ $id }}" {{ request('college_id') == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
