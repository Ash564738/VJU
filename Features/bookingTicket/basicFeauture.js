import * as StyleGetter from '../StyleGetter.js'
export {
    changeProgress,
    elementWidthToPercent
}

const elementWidthToPercent = (child, parent) => {
    return (child.offsetWidth + StyleGetter.getPadding(child,'x'))/(parent.offsetWidth + StyleGetter.getPadding(parent,'x'))*100
}

const changeProgress = (value) => {
    value = Math.round(value)
    console.log("value -> ", value)
    let progressBar = document.getElementById('progress-bar');
    progressBar.style.width = (value + '%');
    progressBar.setAttribute('aria-valuenow',value+'');
}
