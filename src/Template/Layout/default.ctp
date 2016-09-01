<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">

    <?= $this->Html->css(['common']);?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class="container-fluid">
        <header class="row">
            <div class="col-md-12">
                <h1>Final Fantasy Brave Exvius</h1>
                <p>Unit Helper</p>
            </div>
        </header>
        <nav class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-justified">
                    <li <?= ($this->request->controller === 'Units' && $this->request->action === 'index') ? 'class="active"' : ''?>>
                        <?= $this->Html->link('Units', ['controller' => 'Units', 'action' => 'units'])?>
                    </li>
                    <li <?= ($this->request->controller === 'Units' && $this->request->action === 'party') ? 'class="active"' : ''?>>
                        <?= $this->Html->link('Build party', ['controller' => 'Units', 'action' => 'party'])?>
                    </li>
                    <li <?= ($this->request->controller === 'Users' && $this->request->action === 'login') ? 'class="active"' : ''?>>
                        <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'])?>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>

        <footer class="row">
            <div class="col-md-12">
                <p>This is just a fan project to scratch my own itch.</p>
                <p><a href="https://github.com/davidyell/FFBE-Helper">You can find all the code on Github</a></p>
                <p><?= $this->Html->image('Baked-with-CakePHP.png', ['class' => 'baked-with-cake', 'url' => 'http://cakephp.org/'])?></p>
                <p>Thanks to <a href="https://exviuswiki.com/">Exviuswiki.com</a></p>
            </div>
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <?= $this->Html->script(['common', 'jquery.stickytableheaders.min.js']);?>
    <?= $this->fetch('script') ?>
</body>
</html>
