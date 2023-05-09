const ul = document.querySelector(".nav__wrapper_animations")
const liList = ul.querySelectorAll("li")
const returnBtn = document.getElementById("return")
const textAlignRadios = document.querySelectorAll("input[name='textAlign']")
const sizeTextInput = document.getElementById("sizeText")
const colorTextInput = document.getElementById("colorText")
const stylesheet = document.styleSheets[0]

const updateStyleForClass = (sheet, selector, property, value) => {
  for (let i = 0; i < sheet.cssRules.length; i++) {
    let rule = sheet.cssRules[i]
    if (rule.selectorText === selector) {
      rule.style.setProperty(property, value)
      break
    }
  }
}
textAlignRadios.forEach((textAlignRadio) => {
  textAlignRadio.addEventListener("change", () => {
    updateStyleForClass(
      stylesheet,
      ".nav__wrapper_animations",
      "text-align",
      `${textAlignRadio.value}`
    )
  })
})
sizeTextInput.addEventListener("input", () => {
  let sizeTextValue = sizeTextInput.value
  if (sizeTextValue < 14) {
    sizeTextValue = 14
  }
    updateStyleForClass(
      stylesheet,
      ".nav__wrapper_animations a",
      "font-size",
      `${sizeTextValue * 0.1}rem`
    )
})
colorTextInput.addEventListener("change", () => {
    updateStyleForClass(
      stylesheet,
      ".nav__wrapper_animations a",
      "color",
      `${colorTextInput.value}`
    )
})

liList.forEach((li, index) => {
  const activateItemsDownOpac = (reverse = "", clickDisabled = "") => {
    for (let i = index + 1; i < liList.length; i++) {
      liList[i].className = `active-item-${reverse}down-${
        liList.length - 1
      }00-opac0 ${clickDisabled}`
    }
  }
  const activateItemsUpOpac = (reverse = "", clickDisabled = "") => {
    for (let i = 0; i < index; i++) {
      liList[i].className = `active-item-${reverse}up-${
        index + 1
      }00-opac0 ${clickDisabled}`
    }
  }
  const activateItemsUp = (reverse = "", clickDisabled = "") => {
    liList[
      index
    ].className = `active-item-${reverse}up-${index}00 ${clickDisabled}`
  }
  const activateItemsUpAndDown = (reverse = "", clickDisabled = "") => {
    activateItemsUpOpac(reverse, clickDisabled)
    activateItemsUp(reverse, clickDisabled)
    activateItemsDownOpac(reverse, clickDisabled)
  }

  li.addEventListener("click", () => {
    for (let i = 0; i < liList.length; i++) {
      if (index == 0) {
        activateItemsDownOpac("", "clickDisabled")
      }
      if (index == i && !index == 0) {
        activateItemsUpAndDown("", "clickDisabled")
      }
    }
    returnBtn.addEventListener("click", () => {
      for (let i = 0; i < liList.length; i++) {
        if (index == 0) {
          activateItemsDownOpac("reverse-")
        }
        if (index == i && !index == 0) {
          activateItemsUpAndDown("reverse-")
        }
      }
    })
  })
})
