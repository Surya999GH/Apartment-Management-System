const nav = document.querySelector('.Headbar')
fetch('/Try.html')
.then(res=>res.text())
.then(data=>{
    Try.innerHTML=data
    const parser = new DOMParser()
    const doc = parser.parseFromString(data, 'text/html')
    eval(doc.querySelector('script').textContent)
})