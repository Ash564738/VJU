import { getHtmlData } from "./Navigation.js";

const FOOTER_FILE_PATH = '/footer.html'

const insertFooter = async () => {
    let footText = await getHtmlData(FOOTER_FILE_PATH)
    console.log('aaa')
    const parser = new DOMParser();
    let doc = parser.parseFromString(footText,'text/html')
    let svgTags = doc.getElementsByTagName('svg')
    
    for(let svgTag of svgTags) {
        let svgString = svgTag.outerHTML
        let parsedSvg = parser.parseFromString(svgString,'image/svg+xml')
        svgTag.replaceWith(parsedSvg.documentElement)
    }
    // console.log('aaaa')
    document.body.appendChild(doc.getElementsByTagName('footer').item(0))
}

insertFooter()