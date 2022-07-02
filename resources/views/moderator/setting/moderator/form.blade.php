<div class="col-12">
    <label class="form-label">Name</label>
    <input type="text" name="name"
           class="form-control"
           value="{{ old('name', $moderator->name) }}">
    @error('name')
    <div class="text-danger">
        {{ $message  }}
    </div>
    @enderror
</div>
<div class="col-12">
    <label class="form-label">Email</label>
    <input type="email" name="email"
           value="{{ old('email', $moderator->email) }}"
           class="form-control">
    @error('email')
    <div class="text-danger">
        {{ $message  }}
    </div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">Status</label>
    <select class="form-select" name="status">
        <option value="">Open this select menu</option>
        <option value="active"
                {{ old('status', $moderator->status) == 'active' ? 'selected' : ''
                }}>Active
        </option>
        <option value="non-active" {{ old('status', $moderator->status) == 'non-active' ? 'selected' : ''
            }}>
            Non
            Active
        </option>
    </select>
    @error('status')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control">
    @error('password')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control">
    @error('password_confirmation')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="col-12">
    <div class="d-grid">
        <button type="submit" class="btn btn-secondary">
            {{ $moderator->exists ? 'Update Mod' : 'New Mod' }}
        </button>
    </div>
</div>