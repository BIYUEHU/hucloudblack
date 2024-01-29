<<<<<<< HEAD
<?php
$title = '关于';
require(__DIR__ . '/header.php');
?>

<div class="mdui-container-fluid">
    <div class="mdui-card mdui-hoverable mdui-m-b-2 mdui-m-t-5 mdui-container">
        <div class="mdui-center mdui-card-header mdui-row">
            <img class="mdui-card-header-avatar" src="/favicon.ico" />
            <strong>
                <h1 class="mdui-card-header-title mdui-text-color-grey-800">
                    <?php echo $WEB_INFO['webtitle']; ?>
                </h1>
            </strong>
            <div class="mdui-card-header-subtitle mdui-text-color-orange-900">WeiYiCouldBlack V3.0</div>
            <br>
        </div>
        <div class="mdui-center">
            <img class="mdui-center" width="70%" style="max-width:400px" src="/assets/img/weiyi/3.jpg" />
            <h3 class="mdui-text-center mdui-text-color-theme">By <?php echo $WEB_INFO['author']; ?></h3>
            <h3 class="mdui-text-center">
                <?php echo $WEB_INFO['contact'] ?>
            </h3>
            <h4 class="mdui-text-center mdui-text-color-red-a700">
                <?php echo $WEB_INFO['webdescr']; ?>
            </h4>
        </div>

        <?php if (!empty($WEB_INFO['open'])): ?>
        <div class="mdui-textfield mdui-textfield-floating-label">
            <button mdui-dialog="{target: '#open'}"
                class="mdui-center mdui mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">查看公告</button>
        </div>

        <div class="mdui-dialog" id="open">
            <div class="mdui-dialog-title mdui-text-color-green-a400"><strong>📄公告</strong></div>
            <div class="mdui-dialog-content"><?php echo $WEB_INFO['open']; ?></div>
            <div class="mdui-dialog-actions">
                <a href="/?open=true"><button class="mdui-btn mdui-ripple">我已知晓</button></a>
            </div>
        </div>
        <? endif; ?>

        <?php if (!empty($WEB_INFO['sponsor'])): ?>
        <div class="mdui-textfield mdui-textfield-floating-label">
            <button mdui-dialog="{target: '#copyBTC'}"
                class="mdui-center mdui mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">打个赏</button>
        </div>

        <div class="mdui-dialog" id="copyBTC">
            <div class="mdui-dialog-title">打个赏</div>
            <div class="mdui-dialog-content"><?php echo $WEB_INFO['sponsor']; ?></div>
            <div class="mdui-dialog-actions">
                <button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
                <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确定</button>
            </div>
        </div>
        <? endif; ?>

    </div>
</div>

<?php require(__DIR__ . '/footer.php'); ?>

</body>

=======
<?php
$title = '关于';
require(__DIR__ . '/header.php');
?>

<div class="mdui-container-fluid">
    <div class="mdui-card mdui-hoverable mdui-m-b-2 mdui-m-t-5 mdui-container">
        <div class="mdui-center mdui-card-header mdui-row">
            <img class="mdui-card-header-avatar" src="/favicon.ico" />
            <strong>
                <h1 class="mdui-card-header-title mdui-text-color-grey-800">
                    <?php echo $WEB_INFO['webtitle']; ?>
                </h1>
            </strong>
            <div class="mdui-card-header-subtitle mdui-text-color-orange-900">WeiYiCouldBlack V3.0</div>
            <br>
        </div>
        <div class="mdui-center">
            <img class="mdui-center" width="70%" style="max-width:400px" src="/assets/img/weiyi/3.jpg" />
            <h3 class="mdui-text-center mdui-text-color-theme">By <?php echo $WEB_INFO['author']; ?></h3>
            <h3 class="mdui-text-center">
                <?php echo $WEB_INFO['contact'] ?>
            </h3>
            <h4 class="mdui-text-center mdui-text-color-red-a700">
                <?php echo $WEB_INFO['webdescr']; ?>
            </h4>
        </div>

        <?php if (!empty($WEB_INFO['open'])): ?>
        <div class="mdui-textfield mdui-textfield-floating-label">
            <button mdui-dialog="{target: '#open'}"
                class="mdui-center mdui mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">查看公告</button>
        </div>

        <div class="mdui-dialog" id="open">
            <div class="mdui-dialog-title mdui-text-color-green-a400"><strong>📄公告</strong></div>
            <div class="mdui-dialog-content"><?php echo $WEB_INFO['open']; ?></div>
            <div class="mdui-dialog-actions">
                <a href="/?open=true"><button class="mdui-btn mdui-ripple">我已知晓</button></a>
            </div>
        </div>
        <? endif; ?>

        <?php if (!empty($WEB_INFO['sponsor'])): ?>
        <div class="mdui-textfield mdui-textfield-floating-label">
            <button mdui-dialog="{target: '#copyBTC'}"
                class="mdui-center mdui mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">打个赏</button>
        </div>

        <div class="mdui-dialog" id="copyBTC">
            <div class="mdui-dialog-title">打个赏</div>
            <div class="mdui-dialog-content"><?php echo $WEB_INFO['sponsor']; ?></div>
            <div class="mdui-dialog-actions">
                <button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
                <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确定</button>
            </div>
        </div>
        <? endif; ?>

    </div>
</div>

<?php require(__DIR__ . '/footer.php'); ?>

</body>

>>>>>>> 9ee86424b546e053f207426a6a99f8bf7275517a
</html>