$(()=>{
    class helpersFuncs{
        borderRemoverAsScreen(elements,screenSize,biggerSize,smallerSize){
            if(smallerSize&&biggerSize&&window.innerWidth>screenSize[0]&&window.innerWidth<screenSize[1]){
                borderRemover()
            }else if(biggerSize&&window.innerWidth<screenSize){
                borderRemover()
            }else if(smallerSize&&window.innerWidth>screenSize){
                borderRemover()
            }
            function borderRemover(){
                $(elements).each((index,element)=>{
                    $(element).removeClass('border-start')
                })
            }

        }
        }

    const borderXSNone=$('.border-xs-none')

    const borderMDNone=$('.border-md-none')

    const borderLGNone=$('.border-lg-none')

    let helperClass=new helpersFuncs()

    helperClass.borderRemoverAsScreen(borderXSNone,576,true,false)

    helperClass.borderRemoverAsScreen(borderMDNone,[576,768],true,true)

    helperClass.borderRemoverAsScreen(borderLGNone,[768,992],true,true)

    $(window).resize(()=>{
        if(window.innerWidth<567){
            borderAdder(borderMDNone)
            borderAdder(borderLGNone)
            helperClass.borderRemoverAsScreen(borderXSNone,576,true,false)
        }else if(window.innerWidth>567&&window.innerWidth<768){
            borderAdder(borderXSNone)
            borderAdder(borderLGNone)
            helperClass.borderRemoverAsScreen(borderMDNone,[576,768],true,true)
        }else if(window.innerWidth>768&&window.innerWidth<992){
            borderAdder(borderXSNone)
            borderAdder(borderMDNone)
            helperClass.borderRemoverAsScreen(borderLGNone,[768,992],true,true)
        }else {
            borderAdder(borderXSNone)
            borderAdder(borderMDNone)
            borderAdder(borderLGNone)
        }
        function borderAdder(elements){
            $(elements).each((index,element)=>{
                $(element).addClass('border-start')
            })
        }
    })
})
document.addEventListener('alpine:init', () => {
    Alpine.data('orgAndDes', () => ({
        cityIndex:null,
        firsTimeSelectValue:[true,true],
        invalidSameCity:'',
        isInvalid:[false,false],
        settedCities:[],
        cities:['tehran','ahvaz','shiraz','mashhad','bandarabbas','isfehan','tabriz','kish','birjand'],
        open:false,
        dropdownPos:'',
        ValueSelected:['',''],
        value:{destinationValue:'',originValue:''},
        dropdownStyle:{},
        dropdownOpenFirst:true,
        init(){
          window.addEventListener('keyup',()=>{
                if(event.key==='Tab'){
                    if(event.target===this.$refs.Origin){
                        this.dropdownPos='origin'
                        this.open=true
                    }else if(event.target===this.$refs.Destination){
                        this.open=true
                        this.cityDropdownMover()
                    }
                }
          })
        },
        cityDropdownMover(){
            if(this.$refs.dropdownMenu.classList.contains('dropdown-menu-move')){
                this.$refs.dropdownMenu.classList.add('dropdown-menu-moveback')
                this.$refs.dropdownMenu.classList.remove('dropdown-menu-move')
                this.open && this.$refs.Origin.focus()
            }else{
                this.$refs.dropdownMenu.classList.remove('dropdown-menu-moveback')
                this.$refs.dropdownMenu.classList.add('dropdown-menu-move')
                this.open && this.$refs.Destination.focus()
            }
        },
        valueFixer(valueIndex,selectedInputIndex){
             this.value[valueIndex]=this.ValueSelected[selectedInputIndex]
        },dropdownMenuSwitch(val,dropPos,setEmpty,valueIndex,valueIndexText){
            this.dropdownPos=dropPos
            this.settedCities=this.cities
            if(this.ValueSelected[0]||this.ValueSelected[1]){
              this.valueFixer(valueIndexText,valueIndex)
            }
            if(this.dropdownOpenFirst){
                this.dropdownStyle.transform=`translateX(${val}px)`
            }else{
                this.dropdownStyle.transform=``
                this.$refs.dropdownMenu.classList.add(val[0])
                this.$refs.dropdownMenu.classList.remove(val[1])
                if(setEmpty){
                        if(this.ValueSelected[valueIndex]===''){
                            this.setInvalid(valueIndex,valueIndexText)
                        }
                    }
                }
            this.dropdownOpenFirst=false;
            if(!this.open){
                this.open=true
            }
        },
        valueSetter(city){
            this.cityIndex=null
            if(this.dropdownPos==='destination'){
                this.value.destinationValue=city
                this.ValueSelected[1]=city
                this.dropdownMenuSwitch(['dropdown-menu-move','dropdown-menu-moveback'],'',false,1,'destinationValue')
                this.dropdownPos='origin'
                this.isInvalid[1]=false
                this.firsTimeSelectValue[1]=false
            }else{
                this.value.originValue=city
                this.ValueSelected[0]=city
                this.dropdownMenuSwitch(['dropdown-menu-moveback','dropdown-menu-move'],'',false,0,'originValue')
                this.dropdownPos='destination'
                this.isInvalid[0]=false
                this.firsTimeSelectValue[0]=false
            }
            if((this.value['destinationValue']===this.value['originValue'])===false){
                if(this.value['destinationValue']!==''&&this.value['originValue']!==''){
                    this.open=false
                    this.$refs.Origin.blur()
                    this.$refs.Destination.blur()
                }
            }else if((this.value['destinationValue']===this.value['originValue'])===true){
                if(this.dropdownPos==='origin'){
                    this.value['originValue']=''
                    this.invalidSameCity=0
                    this.ValueSelected[0]=''
                }else{
                    this.value['destinationValue']=''
                    this.invalidSameCity=1
                    this.ValueSelected[1]=''
                }
            }
        },citySetter(){

            if(this.value['destinationValue']===''&&this.value['originValue']===''){
                this.settedCities=this.cities
            }else{
                this.settedCities=[];
                this.cities.forEach(city=>{
                    if(city.startsWith(event.target.value)){
                        this.settedCities.push(city)
                    }
                })
            }
        },
        inputClickOutside(selectedInputIndex,Class,valueIndex){

            if(event.target.classList.contains('city')===false){
                if((this.ValueSelected[selectedInputIndex]===this.value[valueIndex])===false&&this.ValueSelected[selectedInputIndex]!==''){
                    this.valueFixer(valueIndex,selectedInputIndex)
                    this.isInvalid[selectedInputIndex]=false
                }else if(this.value[valueIndex]!==''&&this.ValueSelected[selectedInputIndex]===''){
                    this.value[valueIndex]=''
                    this.isInvalid[selectedInputIndex]=true
                    console.log('s')
                }
            }
        },
        inputTab(input,inputIndex){
            if(input==='destination'){
                this.open=false
                this.dropdownPos=''
                if(this.ValueSelected[1]!==''){
                    this.valueFixer('destinationValue',1)
                }else{
                    this.setInvalid(1,'destinationValue')
                }
            }else{
                this.dropdownPos='destination'
            }
        },setInvalid(inputIndex,InputTextIndex){
            if(this.firsTimeSelectValue[inputIndex]===false){
                this.isInvalid[inputIndex]=true
                this.value[InputTextIndex]=''
            }
        },inputKeyUp(inputIndex){
            this.citySetter()
            this.isInvalid[inputIndex]=false
            if((event.key==='ArrowDown'||event.key==='ArrowUp'||event.key==='Enter')===false){
                this.cityIndex=null
            }
            if(event.key!=='Tab'){
                this.firsTimeSelectValue[inputIndex]=false
            }
        },dropdownMenuClickOutside(){
            if(event.target.classList.contains('origin')===false&&event.target.classList.contains('destination')===false){
                this.open=false
                this.dropdownOpenFirst=true
                if(this.invalidSameCity!==''&&this.ValueSelected[this.invalidSameCity]===''){
                    this.isInvalid[this.invalidSameCity]=true
                }
            }
        },valueMover:{
            ['@click'](){
                if(this.ValueSelected[1]&&this.ValueSelected[0]){
                    this.value['destinationValue']=this.ValueSelected[0]
                    this.value['origin']=this.ValueSelected[1]
                    this.ValueSelected[1]=this.ValueSelected[0]
                    this.ValueSelected[0]=this.value['origin']
                    this.$el.style.cursor='pointer'
                }
            },
            ['@mouseover'](){
                if(this.ValueSelected[1]&&this.ValueSelected[0]){
                    this.$el.style.cursor='pointer'
                }else{
                    this.$el.style.cursor='not-allowed'
                }
            }
        },selectNextCity(){
            if(this.cityIndex===null){
                this.cityIndex=0
            }else{
                if(this.cityIndex===this.settedCities.length-1){
                    this.cityIndex=0
                }else{
                    this.cityIndex++
                }
            }
            this.scrollToSelectedCity()
        },selectPrevCity(){
            if(this.cityIndex===null){
                this.cityIndex=this.settedCities.length-1
            }else{
                if(this.cityIndex===0){
                    this.cityIndex=this.settedCities.length-1
                }else{
                    this.cityIndex--
                }
            }
            this.scrollToSelectedCity()
        },scrollToSelectedCity(){
            if(this.$refs.dropdownMenu.children.length!==3){
                this.$refs.dropdownMenu.children[this.cityIndex+1].scrollIntoView({block:'center'})
            }
        },
        chooseCity(){
            this.valueSetter(this.$refs.dropdownMenu.children[this.cityIndex+1].textContent.trim())
            this.cityDropdownMover()
        }
    }))
})
document.addEventListener('alpine:init', () => {
    Alpine.data('pageChanger', () => ({
        page:'innerfly',
    changeActiveTitle(){

        let titles=document.querySelectorAll('.services')

        titles.forEach(title=>{
            if(title.classList.contains(this.page)){
                title.classList.remove('card-header-items-hover')
                title.classList.add('text-primary')
            }else{
                title.classList.add('card-header-items-hover')
                title.classList.remove('text-primary')
            }
        })

    },pageChanger(pageName){
            this.page=pageName
    },pageDetector(){
            let defaultActive=document.querySelector(`.${this.page}`)
            defaultActive.classList.remove('card-header-items-hover')
            defaultActive.classList.add('text-primary')
    }
    }))
})
