<?php
$data = '/data/www/green';

$git = 'git@git.oschina.net:guixianfeng/green.git';

echo shell_exec(" cd {$data} && git pull {$git} 2>&1 ");
