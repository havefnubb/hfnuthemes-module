{meta_html assets 'hfnuthemes'}
{include 'hlp_themes'}
<h1>{@hfnuthemes~theme.themes@}</h1>
<h2>{@hfnuthemes~theme.list@}</h2>
{foreach $themes as $ind=>$theme}
<div class="two-cols">
    <div class="col">
        <h3>{if $current_theme == strtolower($themes[$ind]['name'])}
                <img src="{jurl 'jelix~www:getfile', array('targetmodule'=>'hfnuthemes', 'file'=>'rosette.png')}"
                     alt="{@hfnuthemes~theme.use.this.theme@}"/>{/if}
            {$themes[$ind]['label'][$lang]}</h3>
        <a href="{jurl 'default:useit',array('theme'=>$themes[$ind]['name'])}" title="{@hfnuthemes~theme.use.this.theme@}">
            {image 'themes/'.strtolower($themes[$ind]['name']).'/theme.png', array('alt'=>@hfnuthemes~theme.use.this.theme@,'height'=>150,'width'=>380)}</a><br/>
        {$themes[$ind]['description'][$lang]}<br/>
        <em>{$themes[$ind]['version']} {@theme.created.on@} {$themes[$ind]['createddate']|jdatetime:'db_date':'lang_date'}</em>
    </div>
</div>
{/foreach}
