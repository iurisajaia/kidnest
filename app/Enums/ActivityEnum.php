<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

final class ActivityEnum extends Enum
{
    const ACTIVITIES = [
        [
            'title' => [
                'ka' => 'ბაღში მოსვლა',
            ],
            'description' => [
                'ka' => 'თქვენი ბავშვი უკვე ბაღშია'
            ],
            'key' => 'kindergarten_visit'
        ],
        [
            'title' => [
                'ka' => 'დაგვიანებით მოსვლა',
            ],
            'description' => [
                'ka' => 'თქვენი შვილი დაგვიანებით მოვიდა'
            ]
        ],
        [
            'title' => [
                'ka' => 'საუზმე',
            ],
            'description' => [
                'ka' => 'თქვენმა შვილმა ისაუზმა'
            ]
        ],
        [
            'title' => [
                'ka' => 'ხემსი',
            ],
            'description' => [
                'ka' => 'თქვენმა შვილმა წაიხემსა'
            ]
        ],
        [
            'title' => [
                'ka' => 'სადილი',
            ],
            'description' => [
                'ka' => 'თქვენმა შვილმა ისადილა'
            ]
        ],
        [
            'title' => [
                'ka' => 'ვახშამი',
            ],
            'description' => [
                'ka' => 'თქვენმა შვილმა ივახშმა'
            ]
        ],
        [
            'title' => [
                'ka' => 'ეზოს აქტივობა',
            ],
            'description' => [
                'ka' => 'თქვენი შვილი ეზოშია'
            ]
        ],
        [
            'title' => [
                'ka' => 'წიგნიერება(აუდიო ზღაპრები)',
            ],
            'description' => [
                'ka' => 'დღეს ახალი ზღაპარი გავიარეთ'
            ]
        ],
        [
            'title' => [
                'ka' => 'ძილი',
            ],
            'description' => [
                'ka' => 'თქვენმა შვილმა უკვე დაიძინა'
            ]
        ]
    ];
}
