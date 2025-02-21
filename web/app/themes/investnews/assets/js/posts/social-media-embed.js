document.addEventListener('DOMContentLoaded', function() {
    const embedContainers = document.querySelectorAll('.social-media-embed-container');

    embedContainers.forEach(container => {
        const type = container.dataset.type;
        const url = container.dataset.url;

        switch(type) {
            case 'instagram':
                embedInstagram(container, url);
                break;
            case 'twitter':
                embedTwitter(container, url);
                break;
            case 'facebook':
                embedFacebook(container, url);
                break;
            case 'tiktok':
                embedTikTok(container, url);
                break;
            case 'linkedin':
                embedLinkedIn(container, url);
                break;
        }
    });
});

function embedInstagram(container, url) {
    container.innerHTML = `<blockquote class="instagram-media" data-instgrm-permalink="${url}"></blockquote>`;
    if (window.instgrm) {
        window.instgrm.Embeds.process();
    } else {
        const script = document.createElement('script');
        script.src = '//www.instagram.com/embed.js';
        document.body.appendChild(script);
    }
}

function embedTwitter(container, url) {

    url = url.replace("https://x.com", "https://twitter.com");

    console.log(url);    

    container.innerHTML = `<blockquote class="twitter-tweet"><a href="${url}"></a></blockquote>`;
    
    if (window.twttr) {
        window.twttr.widgets.load();
    } else {
        const script = document.createElement('script');
        script.src = 'https://platform.twitter.com/widgets.js';
        document.body.appendChild(script);
    }
}


function embedFacebook(container, url) {
    container.innerHTML = `<div class="fb-post" data-href="${url}"></div>`;
    if (window.FB) {
        window.FB.XFBML.parse();
    } else {
        const script = document.createElement('script');
        script.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0';
        document.body.appendChild(script);
    }
}

function embedTikTok(container, url) {
    // TikTok requires a blockquote element with the tiktok-embed class and the data-video-id attribute
    const videoId = getTikTokVideoId(url);
    container.innerHTML = `<blockquote class="tiktok-embed" cite="${url}" data-video-id="${videoId}">
        <section><a href="${url}" target="_blank">Carregando TikTok...</a></section>
    </blockquote>`;
    
    // Load TikTok script
    if (!window.tiktokScriptLoaded) {
        const script = document.createElement('script');
        script.src = 'https://www.tiktok.com/embed.js';
        script.async = true;
        document.body.appendChild(script);
        window.tiktokScriptLoaded = true;
    } else if (window.tiktok && window.tiktok.loadEmbeds) {
        window.tiktok.loadEmbeds();
    }
}

function embedLinkedIn(container, url) {
    const postId = getLinkedInPostId(url);
    if (postId) {
        const embedUrl = `https://www.linkedin.com/embed/feed/update/urn:li:activity:${postId}`;
        container.innerHTML = `<iframe src="${embedUrl}" height="612" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>`;
        
        const iframe = container.querySelector('iframe');
        observeIframeContent(iframe);
    } else {
        container.innerHTML = `
            <div class="linkedin-fallback">
                <p>Não foi possível incorporar este conteúdo do LinkedIn.</p>
                <a href="${url}" target="_blank" rel="noopener noreferrer">Ver post no LinkedIn</a>
            </div>
        `;
    }
}

function getLinkedInPostId(url) {
    // Check for all three formats
    const shareMatch = url.match(/urn:li:share:(\d+)/);
    const activityMatch = url.match(/urn:li:activity:(\d+)/);
    const postsMatch = url.match(/linkedin\.com\/posts\/.*?activity-(\d+)/);
    
    return shareMatch ? shareMatch[1] : 
           activityMatch ? activityMatch[1] : 
           postsMatch ? postsMatch[1] : null;
}

function getTikTokVideoId(url) {
    const match = url.match(/\/video\/(\d+)/);
    return match ? match[1] : '';
}

function observeIframeContent(iframe) {
    const resizeObserver = new ResizeObserver(entries => {
        for (let entry of entries) {
            iframe.style.height = (entry.target.scrollHeight + 20) + 'px';
        }
    });

    iframe.onload = function() {
        if (iframe.contentDocument && iframe.contentDocument.body) {
            resizeObserver.observe(iframe.contentDocument.body);
        }
    };
}
