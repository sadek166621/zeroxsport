{{-- Shop Owner Name --}}
<div class="col-md-6">
    <label for="shop_owner_name" class="form-label">Shop Owner Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('shop_owner_name') is-invalid @enderror" name="shop_owner_name" id="shop_owner_name" value="{{ old('shop_owner_name') }}" required>
    @error('shop_owner_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Shop Name --}}
<div class="col-md-6">
    <label for="shop_name" class="form-label">Shop Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" id="shop_name" value="{{ old('shop_name') }}" required>
    @error('shop_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Slug --}}
<div class="col-md-6">
    <label for="slug" class="form-label">Shop Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}">
    <small class="text-muted">Optional, auto-generated if left blank</small>
    @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Phone --}}
<div class="col-md-6">
    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" required>
    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Email --}}
<div class="col-md-6">
    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Address --}}
<div class="col-md-6">
    <label for="address" class="form-label">Shop Address <span class="text-danger">*</span></label>
    <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="1" required>{{ old('address') }}</textarea>
    @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Shop Profile --}}
<div class="col-md-6">
    <label for="shop_profile" class="form-label">Shop Profile Image <span class="text-danger">*</span></label>
    <div class="upload-preview-container mb-2">
        <img id="shop_profile_preview" src="#" alt="Shop Profile Preview" style="max-width: 100%; max-height: 200px; display: none; border-radius: 8px;">
    </div>
    <input type="file" class="form-control @error('shop_profile') is-invalid @enderror" 
           name="shop_profile" id="shop_profile" accept="image/*" required
           onchange="previewImage(this, 'shop_profile_preview')">
    @error('shop_profile')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Shop Cover --}}
<div class="col-md-6">
    <label for="shop_cover" class="form-label">Shop Cover Image <span class="text-danger">*</span></label>
    <div class="upload-preview-container mb-2">
        <img id="shop_cover_preview" src="#" alt="Shop Cover Preview" style="max-width: 100%; max-height: 200px; display: none; border-radius: 8px;">
    </div>
    <input type="file" class="form-control @error('shop_cover') is-invalid @enderror" 
           name="shop_cover" id="shop_cover" accept="image/*" required
           onchange="previewImage(this, 'shop_cover_preview')">
    @error('shop_cover')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- NID --}}
<div class="col-md-6">
    <label for="nid" class="form-label">NID (Optional)</label>
    <div class="upload-preview-container mb-2">
        <img id="nid_preview" src="#" alt="NID Preview" style="max-width: 100%; max-height: 200px; display: none; border-radius: 8px;">
    </div>
    <input type="file" class="form-control @error('nid') is-invalid @enderror" 
           name="nid" id="nid" accept="image/*"
           onchange="previewImage(this, 'nid_preview')">
    @error('nid')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Trade License --}}
<div class="col-md-6">
    <label for="trade_license" class="form-label">Trade License (Optional)</label>
    <div class="upload-preview-container mb-2">
        <img id="trade_license_preview" src="#" alt="Trade License Preview" style="max-width: 100%; max-height: 200px; display: none; border-radius: 8px;">
    </div>
    <input type="file" class="form-control @error('trade_license') is-invalid @enderror" 
           name="trade_license" id="trade_license" accept="image/*"
           onchange="previewImage(this, 'trade_license_preview')">
    @error('trade_license')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Password --}}
<div class="col-md-6">
    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
    <div class="input-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" 
               name="password" id="password" required>
        <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password')">
            <i class="fas fa-eye" id="password_toggle_icon"></i>
        </button>
    </div>
    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Confirm Password --}}
<div class="col-md-6">
    <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
    <div class="input-group">
        <input type="password" class="form-control" name="password_confirmation" 
               id="password_confirmation" required>
        <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password_confirmation')">
            <i class="fas fa-eye" id="password_confirmation_toggle_icon"></i>
        </button>
    </div>
</div>

<style>
.upload-preview-container {
    min-height: 40px;
    transition: all 0.3s ease;
}
.upload-preview-container img {
    object-fit: cover;
    border: 1px solid #dee2e6;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
</style>

<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}

function togglePasswordVisibility(inputId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(inputId + '_toggle_icon');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>