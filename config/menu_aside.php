<?php
return [
    'Admin' => [
        [
            'title' => 'Registration Requests',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Requests',
                    'bullet' => 'dot',
                    'page' => 'user/requests',
                    'root' => true,
                ],
                [
                    'title' => 'Archive',
                    'bullet' => 'dot',
                    'page' => 'user/archived-requests',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Doctor Categories',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Index',
                    'bullet' => 'dot',
                    'page' => 'category',
                    'root' => true,
                ],
                [
                    'title' => 'Create',
                    'bullet' => 'dot',
                    'page' => 'category/create',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Users',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Doctors',
                    'bullet' => 'dot',
                    'page' => 'doctors',
                    'root' => true,
                ],
                [
                    'title' => 'Patients',
                    'bullet' => 'dot',
                    'page' => 'patients',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Blog',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Create',
                    'bullet' => 'dot',
                    'page' => 'blog/create',
                    'root' => true,
                ],
                [
                    'title' => 'Index',
                    'bullet' => 'dot',
                    'page' => 'blog',
                    'root' => true,
                ],
            ]
        ],
    ],
    'Doctor' => [
        [
            'title' => 'Doctor Categories',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'page' => 'category',
        ],
        [
            'title' => 'Users',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Doctors',
                    'bullet' => 'dot',
                    'page' => 'doctors',
                    'root' => true,
                ],
                [
                    'title' => 'Patients',
                    'bullet' => 'dot',
                    'page' => 'patients',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Schedule',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Create',
                    'bullet' => 'dot',
                    'page' => 'schedule/create',
                    'root' => true,
                ],
                [
                    'title' => 'Index',
                    'bullet' => 'dot',
                    'page' => 'schedule',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Appointment',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Create',
                    'bullet' => 'dot',
                    'page' => 'appointment/create',
                    'root' => true,
                ],
                [
                    'title' => 'Index',
                    'bullet' => 'dot',
                    'page' => 'appointment',
                    'root' => true,
                ],
                [
                    'title' => 'Requests',
                    'bullet' => 'dot',
                    'page' => 'appointment/requests',
                    'root' => true,
                ],
                [
                    'title' => 'Archive',
                    'bullet' => 'dot',
                    'page' => 'appointment/archive',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Treatment',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Create',
                    'bullet' => 'dot',
                    'page' => 'treatment/create',
                    'root' => true,
                ],
                [
                    'title' => 'Index',
                    'bullet' => 'dot',
                    'page' => 'treatment',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Diagnose',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Create',
                    'bullet' => 'dot',
                    'page' => 'diagnose/create',
                    'root' => true,
                ],
                [
                    'title' => 'Index',
                    'bullet' => 'dot',
                    'page' => 'diagnose',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Advice',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Create',
                    'bullet' => 'dot',
                    'page' => 'advice/create',
                    'root' => true,
                ],
                [
                    'title' => 'Index',
                    'bullet' => 'dot',
                    'page' => 'advice',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Blog',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Create',
                    'bullet' => 'dot',
                    'page' => 'blog/create',
                    'root' => true,
                ],
                [
                    'title' => 'Index',
                    'bullet' => 'dot',
                    'page' => 'blog',
                    'root' => true,
                ],
            ]
        ],
    ],
    'Patient' => [
        [
            'title' => 'Doctor Categories',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'page' => 'category',
        ],
        [
            'title' => 'Doctors',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'page' => 'doctors',
        ],
        [
            'title' => 'Appointment',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Create',
                    'bullet' => 'dot',
                    'page' => 'appointment/create',
                    'root' => true,
                ],
                [
                    'title' => 'Index',
                    'bullet' => 'dot',
                    'page' => 'appointment',
                    'root' => true,
                ],
                [
                    'title' => 'Requests',
                    'bullet' => 'dot',
                    'page' => 'appointment/requests',
                    'root' => true,
                ],
                [
                    'title' => 'Archive',
                    'bullet' => 'dot',
                    'page' => 'appointment/archive',
                    'root' => true,
                ],
            ]
        ],
        [
            'title' => 'Treatment',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'page' => 'treatment',
            'root' => true,
        ],
        [
            'title' => 'Diagnose',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'page' => 'diagnose',
            'root' => true,
        ],
        [
            'title' => 'Blog',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'page' => 'blog',
        ],
        [
            'title' => 'Upload File',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'page' => 'file/create',
        ],
    ],
];
