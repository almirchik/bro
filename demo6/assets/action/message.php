<div class="container">
    <? if (isset($_SESSION['message'])): ?>
        <div class="message">
            <h2>Внимание!</h2>
            <p>
                <?= $_SESSION['message']; ?>
            </p>
            <? unset($_SESSION['message']); ?>
        </div>
    <? endif; ?>
</div>