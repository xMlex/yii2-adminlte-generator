# yii2-adminlte-generator

Install
---

- composer
`composer require --prefer-dist xmlex/generator "dev-master"`
or in section "require-dev"
`"xmlex/generator": "dev-master"`

config gii
```
$config['modules']['gii'] = [
        ...
        'generators' => [
            'crud' => [
                'class' => 'xmlex\adminlte\generators\crud\Generator',
                'templates' => [
                    'LTEAdmin' => '@vendor/xmlex/generator/generators/crud/default',
                ]
            ]
        ],
        ...
    ];
```

- Profit!