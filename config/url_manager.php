<?php

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => false,
    'rules' => [
        [
            'pattern' => 'day/<month:\d+>/<day:\d+>',
            'route'   => 'day/index'
        ]
    ],
];