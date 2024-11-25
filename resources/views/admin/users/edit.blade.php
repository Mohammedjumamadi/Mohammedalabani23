@section('content')
<div class="container mt-5">
    <h2 class="text-right mb-4" style="color: #d32f2f; font-weight: bold; font-size: 28px;">تعديل بيانات المستخدم</h2>

    <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">نموذج تعديل المستخدم</h5>
        </div>
        <div class="card-body p-5" style="background: #f8f9fa;">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="text-right">
                @csrf
                @method('PUT')

                <!-- الاسم -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label" style="font-weight: bold; font-size: 16px;">الاسم <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="أدخل الاسم الكامل" required>
                    </div>
                </div>

                <!-- البريد الإلكتروني -->
                <div class="form-group mb-4">
                    <label for="email" class="form-label" style="font-weight: bold; font-size: 16px;">البريد الإلكتروني <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="example@example.com" required>
                    </div>
                </div>

                <!-- العمر -->
                <div class="form-group mb-4">
                    <label for="age" class="form-label" style="font-weight: bold; font-size: 16px;">العمر <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $user->age) }}" placeholder="أدخل العمر" required>
                    </div>
                </div>

                <!-- العنوان -->
                <div class="form-group mb-4">
                    <label for="address" class="form-label" style="font-weight: bold; font-size: 16px;">العنوان <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}" placeholder="أدخل العنوان" required>
                    </div>
                </div>

                <!-- رقم الهاتف -->
                <div class="form-group mb-4">
                    <label for="phone" class="form-label" style="font-weight: bold; font-size: 16px;">رقم الهاتف <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="أدخل رقم الهاتف" required>
                    </div>
                </div>

                <!-- المستوى التعليمي -->
                <div class="form-group mb-4">
                    <label for="education" class="form-label" style="font-weight: bold; font-size: 16px;">المستوى التعليمي <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-graduation-cap"></i></span>
                        </div>
                        <select class="form-control" id="education" name="education" required>
                            <option value="ثانوي" {{ old('education', $user->education) == 'ثانوي' ? 'selected' : '' }}>ثانوي</option>
                            <option value="دبلوم" {{ old('education', $user->education) == 'دبلوم' ? 'selected' : '' }}>دبلوم</option>
                            <option value="بكالوريوس" {{ old('education', $user->education) == 'بكالوريوس' ? 'selected' : '' }}>بكالوريوس</option>
                            <option value="ماجستير" {{ old('education', $user->education) == 'ماجستير' ? 'selected' : '' }}>ماجستير</option>
                            <option value="دكتوراه" {{ old('education', $user->education) == 'دكتوراه' ? 'selected' : '' }}>دكتوراه</option>
                        </select>
                    </div>
                </div>

                <!-- الخبرة أو المهنة -->
                <div class="form-group mb-4">
                    <label for="profession" class="form-label" style="font-weight: bold; font-size: 16px;">الخبرة أو المهنة <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-briefcase"></i></span>
                        </div>
                        <input type="text" class="form-control" id="profession" name="profession" value="{{ old('profession', $user->profession) }}" placeholder="أدخل الخبرة أو المهنة" required>
                    </div>
                </div>

                <!-- الجنس -->
                <div class="form-group mb-4">
                    <label for="gender" class="form-label" style="font-weight: bold; font-size: 16px;">الجنس <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-venus-mars"></i></span>
                        </div>
                        <select name="gender" class="form-control">
                            <option value="ذكر" {{ old('gender', $user->gender) == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                            <option value="أنثى" {{ old('gender', $user->gender) == 'أنثى' ? 'selected' : '' }}>أنثى</option>
                        </select>
                    </div>
                </div>

                <!-- رقم الهوية الوطنية -->
                <div class="form-group mb-4">
                    <label for="national_id" class="form-label" style="font-weight: bold; font-size: 16px;">رقم الهوية الوطنية <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-id-card"></i></span>
                        </div>
                        <input type="text" class="form-control" id="national_id" name="national_id" value="{{ old('national_id', $user->national_id) }}" placeholder="أدخل رقم الهوية" required>
                    </div>
                </div>

                <!-- نوع المتطوع -->
                <div class="form-group mb-4">
                    <label for="volunteer_type" class="form-label" style="font-weight: bold; font-size: 16px;">نوع المتطوع <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fas fa-users"></i></span>
                        </div>
                        <select class="form-control" id="volunteer_type" name="volunteer_type" required>
                            <option value="technical">الدعم الفني</option>
                            <option value="physical">الدعم الجسدي</option>
                            <option value="psychological">الدعم النفسي</option>
                            <option value="social">الدعم الاجتماعي</option>
                            <option value="administrative">الدعم الإداري</option>
                            <option value="media">الدعم الإعلامي</option>
                            <option value="medical">الدعم الطبي</option>
                            <option value="educational">الدعم التعليمي والتوعوي</option>
                        </select>
                    </div>
                </div>

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg" style="font-size: 18px; font-weight: bold; padding: 10px 20px;">تحديث البيانات</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- إضافة روابط Bootstrap و FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

