@include('dashboard.header')

@include('dashboard.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif

                <form action="{{ url('admin/createassignsubject') }}" method="POST">
                    @csrf

                    <h4>{{ $view_subject->subjectname }}</h4>

                    {{-- SUBJECT INFORMATION --}}
                    <input type="hidden"
                           name="subjectname"
                           value="{{ $view_subject->subjectname }}">

                    <input type="hidden"
                           name="subject_id"
                           value="{{ $view_subject->id }}">

                    <input type="hidden"
                           name="connect"
                           value="{{ $view_subject->connect }}">

                    <input type="hidden"
                           name="section"
                           value="{{ $view_subject->section }}">

                    <input type="hidden"
                           name="subsection"
                           value="{{ $view_subject->subsection }}">

                    {{-- TEACHER INFORMATION --}}
                    <input type="hidden"
                           name="ref_no"
                           id="ref_no"
                           value="">

                    <input type="hidden"
                           name="teacher_alms"
                           id="teacher_alms"
                           value="">

                    <div class="row">

                        {{-- CLASS --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Class</label>

                                <select name="classname" class="form-control" required>
                                    @foreach($view_classes as $view_classe)
                                        <option value="{{ $view_classe->classname }}">
                                            {{ $view_classe->classname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- ARM --}}
                            <div class="form-group">
                                <label>Select Arm</label>

                                <select name="alms" id="alms" class="form-control">
                                    @foreach($view_arms as $view_arm)
                                        <option value="{{ $view_arm->alms }}">
                                            {{ $view_arm->alms }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- SESSION --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Session</label>

                                <select name="academic_session"
                                        id="academic_session"
                                        class="form-control"
                                        required>

                                    @foreach($sessions as $session)
                                        <option value="{{ $session->academic_session }}">
                                            {{ $session->academic_session }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        {{-- TERM --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Term</label>

                                <select name="term" class="form-control" required>
                                    <option value="First Term">First Term</option>
                                    <option value="Second Term">Second Term</option>
                                    <option value="Third Term">Third Term</option>
                                </select>
                            </div>
                        </div>

                        {{-- TEACHER --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Teacher</label>

                                <select name="user_id"
                                        id="user_id"
                                        class="form-control"
                                        required>

                                    @foreach($view_teachers as $view_teacher)

                                        <option value="{{ $view_teacher->id }}"
                                            data-session="{{ $view_teacher->academic_session }}"
                                            data-ref_no="{{ $view_teacher->ref_no }}"
                                            data-alms="{{ $view_teacher->alms }}">

                                            {{ $view_teacher->fname }}
                                            {{ $view_teacher->surname }}
                                            {{ $view_teacher->school['schoolname'] }}

                                        </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                    {{-- OPTIONAL: SHOW SELECTED REF NO --}}
                    <div class="form-group">
                        <label>Teacher Reference Number</label>

                        <input type="text"
                               id="ref_no_display"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="form-check">
                        <button type="submit"
                                class="btn btn-primary">
                            Submit
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </section>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const userSelect = document.getElementById('user_id');
    const refNoInput = document.getElementById('ref_no');
    const refNoDisplay = document.getElementById('ref_no_display');
    const almsInput = document.getElementById('alms');
    const teacherAlmsInput = document.getElementById('teacher_alms');

    function setTeacherDetails() {

        const option = userSelect.options[userSelect.selectedIndex];

        if (!option) {
            return;
        }

        // Get teacher ref_no
        const refNo = option.getAttribute('data-ref_no') || '';

        // Get teacher arm
        const teacherAlms = option.getAttribute('data-alms') || '';

        // Set hidden ref_no
        refNoInput.value = refNo;

        // Display ref_no so you can see it
        refNoDisplay.value = refNo;

        // Store teacher arm
        teacherAlmsInput.value = teacherAlms;

        console.log('Teacher ID:', option.value);
        console.log('Teacher Ref No:', refNo);
        console.log('Teacher Alms:', teacherAlms);
    }

    // Set values for initially selected teacher
    setTeacherDetails();

    // Change values when teacher changes
    userSelect.addEventListener('change', setTeacherDetails);

});
</script>

@include('dashboard.footer')