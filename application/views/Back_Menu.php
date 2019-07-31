<?php $caminho = base_url('index.php') ?>
 <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li style="padding: 10px 0 0;">
                <a href="<?= $caminho?>/Back_Home" class="waves-effect">
                    <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= $caminho?>/Back_Perguntas" class="waves-effect">
                    <i class="fa fa-question fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu">Perguntas</span>
                </a>
            </li>
            <li>
                <a href="<?= $caminho?>/Back_Quiz" class="waves-effect">
                    <i class="fa fa-table fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu">Quiz</span>
                </a>
            </li>
            <li>
                <a href="<?= $caminho?>/Back_Salas" class="waves-effect">
                    <i class="fa fa-group fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu">Salas</span>
                </a>
            </li>
            <li>
                <a href="<?= $caminho?>/Front_Home" class="waves-effect">
                    <i class="fa  fa-list-alt fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu">Site</span>
                </a>
            </li>
        </ul>
    </div>
</div>