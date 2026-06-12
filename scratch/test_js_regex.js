const https = require('https');

https.get('https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6', (res) => {
    let data = '';
    res.on('data', (chunk) => { data += chunk; });
    res.on('end', () => {
        try {
            const posts = JSON.parse(data);
            const post2 = posts[1];
            const content = post2.content ? post2.content.rendered : '';
            const match = content.match(/<img[^>]+src=["']([^"']+)["']/i);
            
            console.log("Post Title:", post2.title.rendered);
            if (match) {
                console.log("MATCH FOUND!");
                console.log("Matched text:", match[0]);
                console.log("Extracted URL:", match[1]);
            } else {
                console.log("NO MATCH FOUND!");
            }
        } catch (e) {
            console.error("Error parsing JSON:", e.message);
        }
    });
}).on('error', (e) => {
    console.error("Error fetching:", e.message);
});
