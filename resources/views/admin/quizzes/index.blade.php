@extends('layouts.admin-layout')

@section('content')
    <nav class="text-sm text-gray-600 mb-4" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li><a href="{{ route('admin.course.index') }}" class="text-blue-600 hover:underline">Courses</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="{{ route('admin.learn.index', $course->id) }}"
                    class="text-blue-600 hover:underline">{{ $course->course_name }}</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="{{ route('admin.lesson-part.index', [$course->id, $learn->id]) }}"
                    class="text-blue-600 hover:underline">{{ $learn->lesson_name }}</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-blue-800">Quizzes</li>
        </ol>
    </nav>

    <div class="p-4">

        <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
            <h1 class="text-2xl font-bold mb-2 text-red-400">
                Daftar Quiz – Bagian Lesson {{ $lessonPart->part_name }}
            </h1>
            <p class="text-white/70 text-sm">
                Kelola quiz pada bagian pelajaran <strong>"{{ $lessonPart->part_name }}"</strong> dari lesson
                <strong>"{{ $learn->lesson_name }}"</strong> dalam kursus <strong>"{{ $course->course_name }}"</strong> yang
                ditampilkan di aplikasi.
            </p>
        </div>


        <div class="w-full relative mt-6">
            <div id="quiz-datatable">
                @include('admin.quizzes._table', ['quizzes' => $quizzes])
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('#quiz-datatable');

            container.addEventListener('click', function(e) {
                const link = e.target.closest('[data-page-url]');
                if (link) {
                    e.preventDefault();
                    const url = link.getAttribute('data-page-url');

                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newContent = doc.querySelector('#quiz-datatable-content');
                            container.innerHTML = newContent.innerHTML;
                            window.history.pushState(null, '', url);
                        });
                }
            });

            container.addEventListener('submit', function(e) {
                const form = e.target.closest('#search-form');
                if (form) {
                    e.preventDefault();
                    const url = form.action + '?search=' + encodeURIComponent(form.search.value);

                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newContent = doc.querySelector('#quiz-datatable-content');
                            container.innerHTML = newContent.innerHTML;
                            window.history.pushState(null, '', url);
                        });
                }
            });
        });
    </script>
@endsection
