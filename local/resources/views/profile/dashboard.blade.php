<section id="page" class="gray-block">

    <div class="col-sm-6">
        <div class='row'>
            {% set relatedPanel = entry.body.type('relatedPanel').first() %}
            {% if(relatedPanel is defined and relatedPanel is not null) %}
            {{  templateMacros.renderPanel(relatedPanel.panel.first()) }}
            {% endif %}
        </div>
    </div>

    <div class="col-sm-6">
        <article class="article mt-3 ml-2">
            <h1 class="page-title page-title-left">
                {{ entry.displayTitle|raw }}
                {{ templateMacros.renderEditButton(entry) }}
            </h1>

            <div class="article-body">
                {{ templateMacros.renderBody(entry.body) }}
            </div>

            <div class="article-meta">
                <div class="article-author" style="background-image: url({{ entry.author.photoUrl }}); background-repeat: no-repeat;">
                    &nbsp;
                </div>
                <div class="article-byline">
                    {{ entry.postDate.format(craft.config.dateFormat) }}
                    {% if entry.byline %}
                    &mdash; {{ entry.byline }} | {{ "Keep It Local" }}
                    {% endif %}
                </div>
            </div>

            <div class="article-sharing">
                <div data-share-default></div>
            </div>

        </article>
    </div>
    <div class="clear-both">
</section>