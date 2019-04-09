<li>
    <a href="{$base_dir}modules/moduletest/moduletest.php" title="{l s='Click this link' mod='moduletest'}">{l s='Click me!' mod='moduletest'}</a>
</li>
<!-- Block moduletest -->
<div id="moduletest_home" class="block">
    <h4>{l s='Welcome!' mod='moduletest'}</h4>
    <div class="block_content">
        <p>
            {if !isset($my_module_name) || !$my_module_name}
                {capture name='my_module_tempvar'}{l s='World' mod='moduletest'}{/capture}
                {assign var='my_module_name' value=$smarty.capture.my_module_tempvar}
            {/if}
            {l s='Hello %1$s!' sprintf=$my_module_name mod='moduletest'}
        </p>
        <ul>
            <li><a href="{$my_module_link}"  title="{l s='Click this link' mod='moduletest'}">{l s='Click me!' mod='moduletest'}</a></li>
        </ul>
    </div>
</div>
<!-- /Block moduletest -->
