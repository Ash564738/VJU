export {
    getHtmlData
}
const NAVIGATION_FILE_PATH = '/nav.html';
const NAVIGATION_STYLE_PATH = '/nav.css';

const getHtmlData = async (filePath) => {
    try {
        const response = await fetch(filePath);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.text();
    } catch (error) {
        console.error('Error loading file:', error);
        return null;
    }
}

const insertNavigationBar = async () => {
    const navigationHTMLText = await getHtmlData(NAVIGATION_FILE_PATH);
    if (navigationHTMLText) {
        const parser = new DOMParser();
        const doc = parser.parseFromString(navigationHTMLText, 'text/html');
        const svgTags = doc.getElementsByTagName('svg');

        // Parse SVGs
        for (let svgTag of svgTags) {
            const svgString = svgTag.outerHTML;
            const parsedSvg = parser.parseFromString(svgString, 'image/svg+xml');
            svgTag.replaceWith(parsedSvg.documentElement);
        }

        // Insert the header before the body content
        document.body.insertBefore(doc.querySelector('header'), document.body.firstChild);

        // Insert the CSS dynamically
        const navStyle = document.createElement('link');
        navStyle.rel = 'stylesheet';
        navStyle.href = NAVIGATION_STYLE_PATH;
        document.head.appendChild(navStyle);
    }
}

insertNavigationBar();
