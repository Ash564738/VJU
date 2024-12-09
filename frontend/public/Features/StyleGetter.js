export {
    getPadding
}

const getPadding = (htmlElement, direction) => {
    let computedStyle = window.getComputedStyle(htmlElement);
    switch(direction) {
        case 'l': {
            return parseFloat(parseFloat(computedStyle.getPropertyValue('padding-left')))

        }
        case 'r': {
            return parseFloat(computedStyle.getPropertyValue('padding-right'))
        }
        case 't': {
            return parseFloat(computedStyle.getPropertyValue('padding-top'))
        }
        case 'b': {
            return parseFloat(computedStyle.getPropertyValue('padding-bottom'))
        }
        case 'x': {
            return getPadding(htmlElement,'l') + getPadding(htmlElement,'r')
        }
        case 'y': {
            return getPadding(htmlElement,'t') + getPadding(htmlElement, 'b')
        }
        case 'a': {
            return getPadding(htmlElement, 'x') + getPadding(htmlElement, 'y')
        }
        default: {
            return getPadding(htmlElement, 'a')
        }
    }
}