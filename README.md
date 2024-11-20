# qiyue
Qiyue Client Package

# Install
```
    composer require ibiteam/qiyue
```

# Inject
```
    edit config/app.php
    Add next content for new line 
    \Qiyue\ServiceProvider\QiyueClientServiceProvider::class,
```

# copy config file
```
    To the application root directory Then Run 
    
    php artisan vendor:publish

    select the option [Qiyue\QiyueClient::class]
    then the config file(qiyue.php) is into config directory as named config/qiyue.php
```

# Usage

```
    About more usage, See Qiyue\Test\QiyueClientTest.php 
```