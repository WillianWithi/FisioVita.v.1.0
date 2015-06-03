google.load("feeds", "1", { "callback": getNews });

function getNews() {
    var feedBr = new google.feeds.Feed("http://newsbr.bitinvest.com.br/rss.xml");
    feedBr.includeHistoricalEntries();
    feedBr.setNumEntries(5);
    feedBr.load(function (result) {
        $("#divNewsBR i").remove();
        if (!result.error) {
            var container = $("#divNewsBR");
            for (var i = 0; i < result.feed.entries.length; i++) {
                var entry = result.feed.entries[i];
                container.append(newsString(entry));
            }
        }
    });

    var feed = new google.feeds.Feed("http://news.bitinvest.com.br/rss.xml");
    feed.includeHistoricalEntries();
    feed.setNumEntries(5);
    feed.load(function (result) {
        $("#divNews i").remove();
        if (!result.error) {
            var container = $("#divNews");
            for (var i = 0; i < result.feed.entries.length; i++) {
                var entry = result.feed.entries[i];
                container.append(newsString(entry));
            }
        }
    });
}

function newsString(entry) {
    var regex = /<img.*?src="(.*?)"/;
    var regexExec = regex.exec(entry.content);
    var imgSrc = (regexExec != null ? regexExec[1] : "");
    imgSrc = imgSrc.replace("http://img.scoop.it", "//d1lojpvs1j5ni5.cloudfront.net");

    var snippet = entry.contentSnippet;
    if (snippet.lastIndexOf("See it") > 0) {
        snippet = snippet.substr(0, snippet.lastIndexOf("See it"));
    }

    var returnString = 
        '<div class="media">' +
        '    <a class="pull-left" href="' + entry.link + '" target="_blank" rel="nofollow">' +
        '        <img class="media-object" src="' + imgSrc + '" width="100" />' +
        '    </a>' +
        '    <div class="media-body">' +
        '        <h4 class="media-heading"><a href="' + entry.link + '" target="_blank" rel="nofollow">' + entry.title + '</a></h4>' +
                 snippet + ' <a href="' + entry.link + '" target="_blank" rel="nofollow"><i class="fa fa-external-link"></i></a>' +
        '    </div>' +
        '</div>';

    return returnString;
}
