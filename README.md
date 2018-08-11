#金亿
#金亿websocket 兼任windows linux;

**composer require jinyi/jinyilog dev-master`**

php 5.5>自动注册

- 发布配置 php artisan vendor:publish  --provider="Jinyi\JinyiSocket\SocketServiceProvider
"
use Jinyi\JinyiSocket\Facades\SocketFacade;

SocketFacade::xxxx();