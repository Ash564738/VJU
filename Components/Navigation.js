const NAVIGATION_FILE_PATH = '/nav.html'
const NAVIGATION_STYLE_PATH = '../nav.css'

const getHtmlData = async (filePath) => {
    let returnData = undefined;
    await fetch(filePath)
        .then(response => {
            if (!response.ok) {
               throw new Error('Network response was not ok');
            }
            return response.text();  
        })
        .then(data => {
            returnData = data
            console.log(data)
        })
        .catch(error => {
            console.error('Lỗi khi tải file HTML:', error);
        });
    return returnData;
}

const insertNavigationBar = async () => {
    let navigationHTMLText = await getHtmlData(NAVIGATION_FILE_PATH);

    document.body.innerHTML = navigationHTMLText + document.body.innerHTML;



    /*
    const parser = new DOMParser();
    let doc = parser.parseFromString(navigationHTMLText,'text/html')
    let svgTags = doc.getElementsByTagName('svg')
    
    for(let svgTag of svgTags) {
        let svgString = svgTag.outerHTML
        let parsedSvg = parser.parseFromString(svgString,'image/svg+xml')
        svgTag.replaceWith(parsedSvg.documentElement)
    }
    console.log(doc)
*/
//    document.body.insertBefore(divTags.item(divTags.length-1),document.body.firstChild)
 //   document.body.insertBefore(doc.getElementsByTagName('header').item(0),document.body.firstChild)
}   

//insertNavigationBar()