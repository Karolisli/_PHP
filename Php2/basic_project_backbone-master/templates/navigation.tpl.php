<?php if (isset($nav) && !empty($nav)): ?>
    <div class="nav-wrapper">
        <?php foreach ($nav['navigation'] as $nav_id => $link): ?>
            <div class="field-wrapper">
                <a href="<?php print $link['url']; ?>">
                    <?php print $link['title']; ?>
                </a>

            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
