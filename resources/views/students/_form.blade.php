<div class="card-body">
  <div class="row">
    <div class="col-md-12">
        
      <div class="mb-3">
        <label for="name" class="form-label">Student Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $student->name ?? '') }}">
        @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $student->email ?? '') }}">
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $student->phone ?? '') }}">
        @error('phone')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob', $student->dob ?? '') }}">
        @error('dob')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="college_id" class="form-label">College</label>
        <select name="college_id" id="college_id" class="form-control @error('college_id') is-invalid @enderror">
          <option value="">Select College</option>
          @foreach($colleges as $college)
            <option value="{{ $college->id }}" {{ old('college_id', $student->college_id ?? '') == $college->id ? 'selected' : '' }}>
              {{ $college->name }}
            </option>
          @endforeach
        </select>
        @error('college_id')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Save Student</button>
      </div>
    </div>
  </div>
</div>
