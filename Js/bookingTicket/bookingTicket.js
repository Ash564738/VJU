import * as BasicFeature from '../../Features/bookingTicket/basicFeauture.js'
import * as StyleGetter from '../../Features/StyleGetter.js'

const PROGRESS_BUTTON_LIST = document.getElementsByClassName('Progress-container__progress-button');
const PROGRESS_CONTAINER = document.getElementsByClassName('Progress-container__progress-element').item(0);

const debugging = () => {
    let val = 0;
    for(let bt of PROGRESS_BUTTON_LIST) val += bt.offsetWidth + StyleGetter.getPadding(bt,'x')
    console.log(val + ' - ' + PROGRESS_CONTAINER.offsetWidth)
}

const setDefaultEvent = () => {
    debugging()
    for(let button of PROGRESS_BUTTON_LIST) {
        console.log(button.offsetWidth)
        button.addEventListener('click', () => {
            for(let _button of PROGRESS_BUTTON_LIST) {
                _button.classList.add('custom-text-progress-incompleted')
                _button.classList.remove('custom-text-progress')
            }
            let value = 0;
            for(let _button of PROGRESS_BUTTON_LIST) {
                if(_button == button) break;
                value+= BasicFeature.elementWidthToPercent(_button,PROGRESS_CONTAINER)
                _button.classList.remove('custom-text-progress-incompleted')
                _button.classList.add('custom-text-progress')
            }
            value+=BasicFeature.elementWidthToPercent(button,PROGRESS_CONTAINER)
            button.classList.remove('custom-text-progress-incompleted')
            button.classList.remove('custom-text-progress')

            BasicFeature.changeProgress(value)
        })
    }
}


setDefaultEvent();