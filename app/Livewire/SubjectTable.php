<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Subject;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class SubjectTable extends PowerGridComponent
{
    public function deleteSubject($id)
    {
        Subject::where('subject_id', $id)->delete();

        flash('Kelas berhasil dihapus', 'success');
    }

    // DATA TABLE CONFIG
    public function template(): ?string
    {
        return \App\PowerGridThemes\CustomPowerGridThemes::class;
    }

    public function setUp(): array
    {
        return [
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()
                ->showPerPage(10)
            // ->showRecordCount()
            // ->pagination('components.pagination'),
        ];
    }

    public function noDataLabel(): string|View
    {
        return "Data tidak ditemukan";
    }

    #[On('subject-updated')]
    public function datasource(): ?Collection
    {
        $user = User::where('user_id', Auth::user()->user_id)->first();
        $userSubjects = $user->subjects->map(function ($subject, $index) {
            $subject->teachers = $subject->users->filter(function ($user) {
                return $user->role === 'teacher';
            })->map(function ($user) {
                return $user->name;
            });

            $subject->id = $index;
            $subject->student_count = $subject->users->count() - $subject->teachers->count();

            return $subject;
        })->sortByDesc('created_at');

        return $userSubjects;
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('code', function ($entry) {
                return e(strtoupper($entry->code));
            })
            ->add('name', function ($entry) {
                return "<a href='/subjects/$entry->subject_id'>" . e($entry->name) . '</a>';
            })
            ->add('teachers', function ($entry) {
                $teacherList = $entry->teachers->map(function ($teacher) {
                    return '<li>' . $teacher . '</li>';
                })->implode('');

                return "<ul class='list-disc'>" . $teacherList . "</ul>";
            })
            ->add('student_count', function ($entry) {
                return '<button type="button"
                        class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center inline-flex items-center me-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                clip-rule="evenodd" />
                        </svg>' .
                    e($entry->student_count)
                    . '</button>';
            });
    }

    public function actionsFromView($row)
    {
        return view('actions.subject-actions', ['row' => $row]);
    }

    public function columns(): array
    {
        return [
            Column::make('Kode kelas', 'code')
                ->bodyAttribute('font-bold')
                ->searchable(),

            Column::make('Nama kelas', 'name')
                ->bodyAttribute('font-bold dark:text-white text-gray-900 hover:underline')
                ->sortable()
                ->searchable(),

            Column::make('Dosen pengampu', 'teachers')->searchable()->sortable(),

            Column::make('Jumlah mahasiswa', 'student_count'),

            Column::action('Aksi')
        ];
    }
}
