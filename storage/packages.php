<?php

return [
    "Bfg\Entity\ServiceProvider" => [
        "index" => 0,
        "installed" => true,
        "install_complete" => true,
        "name" => "bfg/entity",
        "logo" => "",
        "provider" => "Bfg\\Entity\\ServiceProvider",
        "version" => "",
        "child" => "",
        "type" => "bfg-app",
        "parent" => "Bfg\\Installer\\ServiceProvider",
        "path" => "vendor/bfg/entity/src/ServiceProvider.php",
        "dir" => "vendor/bfg/entity/src",
        "composer_file" => "vendor/bfg/entity/composer.json",
        "composer_name" => "bfg/entity",
        "composer_version" => "1.2.1",
        "description" => "Pattern for generating php entities.",
        "extensions" => [

        ]
    ],
    "Bfg\Files\ServiceProvider" => [
        "index" => 1,
        "installed" => true,
        "install_complete" => true,
        "name" => "bfg/files",
        "logo" => "",
        "provider" => "Bfg\\Files\\ServiceProvider",
        "version" => "",
        "child" => "",
        "type" => "bfg-app",
        "parent" => "Bfg\\Installer\\ServiceProvider",
        "path" => "vendor/bfg/files/src/ServiceProvider.php",
        "dir" => "vendor/bfg/files/src",
        "composer_file" => "vendor/bfg/files/composer.json",
        "composer_name" => "bfg/files",
        "composer_version" => "0.0.2",
        "description" => "The package is aimed at controlling files",
        "extensions" => [

        ]
    ],
    "Bfg\IdeHelper\ServiceProvider" => [
        "index" => 2,
        "installed" => false,
        "install_complete" => false,
        "name" => "bfg/ide-helper",
        "logo" => "",
        "provider" => "Bfg\\IdeHelper\\ServiceProvider",
        "version" => "",
        "child" => "",
        "type" => "bfg-app",
        "parent" => "Bfg\\Installer\\ServiceProvider",
        "path" => "vendor/bfg/ide-helper/src/ServiceProvider.php",
        "dir" => "vendor/bfg/ide-helper/src",
        "composer_file" => "vendor/bfg/ide-helper/composer.json",
        "composer_name" => "bfg/ide-helper",
        "composer_version" => "0.0.1",
        "description" => "IDE Helper with 'barryvdh'",
        "extensions" => [

        ]
    ],
    "Bfg\Installer\ServiceProvider" => [
        "index" => 3,
        "installed" => true,
        "install_complete" => true,
        "name" => "bfg/installer",
        "logo" => "",
        "provider" => "Bfg\\Installer\\ServiceProvider",
        "version" => "",
        "child" => "bfg-app",
        "type" => "",
        "parent" => "",
        "path" => "vendor/bfg/installer/src/ServiceProvider.php",
        "dir" => "vendor/bfg/installer/src",
        "composer_file" => "vendor/bfg/installer/composer.json",
        "composer_name" => "bfg/installer",
        "composer_version" => "0.2.0",
        "description" => "Simplify the installation process for certain packages",
        "extensions" => [
            "Bfg\Entity\ServiceProvider" => "Bfg\\Entity\\ServiceProvider",
            "Bfg\Files\ServiceProvider" => "Bfg\\Files\\ServiceProvider",
            "Bfg\IdeHelper\ServiceProvider" => "Bfg\\IdeHelper\\ServiceProvider",
            "Bfg\Object\ServiceProvider" => "Bfg\\Object\\ServiceProvider",
            "Bfg\Text\ServiceProvider" => "Bfg\\Text\\ServiceProvider"
        ]
    ],
    "Bfg\Object\ServiceProvider" => [
        "index" => 4,
        "installed" => true,
        "install_complete" => true,
        "name" => "bfg/object",
        "logo" => "",
        "provider" => "Bfg\\Object\\ServiceProvider",
        "version" => "",
        "child" => "",
        "type" => "bfg-app",
        "parent" => "Bfg\\Installer\\ServiceProvider",
        "path" => "vendor/bfg/object/src/ServiceProvider.php",
        "dir" => "vendor/bfg/object/src",
        "composer_file" => "vendor/bfg/object/composer.json",
        "composer_name" => "bfg/object",
        "composer_version" => "0.0.2",
        "description" => "To work with objects and arrays",
        "extensions" => [

        ]
    ],
    "Bfg\Text\ServiceProvider" => [
        "index" => 5,
        "installed" => true,
        "install_complete" => true,
        "name" => "bfg/text",
        "logo" => "",
        "provider" => "Bfg\\Text\\ServiceProvider",
        "version" => "",
        "child" => "",
        "type" => "bfg-app",
        "parent" => "Bfg\\Installer\\ServiceProvider",
        "path" => "vendor/bfg/text/src/ServiceProvider.php",
        "dir" => "vendor/bfg/text/src",
        "composer_file" => "vendor/bfg/text/composer.json",
        "composer_name" => "bfg/text",
        "composer_version" => "0.0.3",
        "description" => "All sorts of chips to work with the text",
        "extensions" => [

        ]
    ]
];