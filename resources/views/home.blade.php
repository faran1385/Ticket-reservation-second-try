@extends('layouts.master')
@section('title','Ticket reservation')
@section('content')
    <div x-data="pageChanger" x-init="pageDetector">
        <section class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div x-data="{sourceIdentifier() {let cardPics=[{innerfly:'https://cdn.alibaba.ir/h2/desktop/assets/images/hero/hero-e1fa22fb.webp',outerfly:'https://cdn.alibaba.ir/h2/desktop/assets/images/hero/hero-b5a880ed.webp',train:'https://cdn.alibaba.ir/h2/desktop/assets/images/hero/hero-f5969150.webp',hotel:'https://cdn.alibaba.ir/h2/desktop/assets/images/hero/hero-8e1d56d8.webp',tour:'https://cdn.alibaba.ir/h2/desktop/assets/images/hero/hero-1398106c.webp',bus:'https://cdn.alibaba.ir/h2/desktop/assets/images/hero/hero-824e4df4.webp'}]
                            return cardPics[0][page]}}">
                            <img class="img-fluid card-img-top" :src="sourceIdentifier()" style="width: 100%"/>
                        </div>
                        <div class="card-header d-flex bg-white px-0">
                            <ul class="nav w-100 d-flex justify-content-around align-baseline m-0">
                                <li class="nav-item col-lg-2 col-md-4 col-sm-6 col-12 text-center ">
                                    <a class="default-cursor w-100 page-link d-flex justify-content-center" href="#">
                                        <div
                                            class="w-75 pointer-cursor  card-header-items-hover services flex-column center train"
                                            @click="pageChanger('train'),changeActiveTitle()">
                                            <svg viewBox="0 0 24 24" width="36px" height="36px" class="mt-3"
                                                 fill="currentColor"
                                                 data-v-554c8425="">
                                                <path
                                                    d="m16.655 16.073.045.06 2.573 3.855a.645.645 0 0 1-1.028.75l-.045-.06-2.572-3.855a.645.645 0 0 1 1.027-.75Zm-7.852-.12a.637.637 0 0 1 .217.825l-.037.067L6.41 20.7a.645.645 0 0 1-.877.18.638.638 0 0 1-.21-.825v-.067l2.572-3.855a.63.63 0 0 1 .908-.18Zm6.397 2.46a.645.645 0 0 1 .075 1.282H9.41a.645.645 0 0 1-.075-1.282H15.2ZM13.91 16.5a.645.645 0 0 1 .075 1.282H10.7a.645.645 0 0 1-.075-1.282h3.285ZM15.523 3a3.217 3.217 0 0 1 3.21 3.202v7.073a1.93 1.93 0 0 1-1.95 1.928h-9a1.928 1.928 0 0 1-1.905-1.928V6.202A3.218 3.218 0 0 1 9.095 3h6.428Zm1.927 6.832-.832.413a4.575 4.575 0 0 1-1.8.465h-4.785a4.613 4.613 0 0 1-1.823-.383l-.195-.09-.825-.412v3.45a.645.645 0 0 0 .57.637h9.023a.645.645 0 0 0 .645-.637l.022-3.443Zm-8.55 1.5a.969.969 0 0 1 .536 1.706.967.967 0 1 1-.536-1.706Zm6.81 0a.967.967 0 1 1-.96.96.959.959 0 0 1 .96-.944v-.016Zm-.187-7.057H9.095A1.935 1.935 0 0 0 7.16 6.202v2.175l1.373.698c.39.194.817.309 1.252.338h4.823a3.39 3.39 0 0 0 1.275-.255l.165-.075 1.402-.706V6.202a1.928 1.928 0 0 0-1.815-1.927h-.112Zm-1.29.637a.645.645 0 0 1 .075 1.283h-3.93a.652.652 0 0 1-.645-.645.645.645 0 0 1 .57-.638h3.93Z"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                            <p class="fs-5" href="#" style="min-width: max-content">Train</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="border-bottom border-2 w-100 d-block d-sm-none"></li>
                                <li class="nav-item col-lg-2 col-md-4 col-sm-6 col-12 center  border-start border-xs-none border-2 d-flex text-center  ">
                                    <a class="page-link default-cursor center w-100 d-flex justify-content-center"
                                       href="#">
                                        <div
                                            class="w-75 pointer-cursor  card-header-items-hover services flex-column center bus"
                                            @click="pageChanger('bus'),changeActiveTitle() ">
                                            <svg viewBox="0 0 24 24" width="36px" height="36px" class="mt-3"
                                                 fill="currentColor"
                                                 data-v-554c8425="">
                                                <path
                                                    d="M15.48 3a3.33 3.33 0 0 1 3.33 3.33h.668a1.335 1.335 0 0 1 1.327 1.23v2.1a.667.667 0 0 1-1.328.083V7.65h-.667v8.662a2.01 2.01 0 0 1-1.342 1.89v1.11a1.665 1.665 0 1 1-3.33 0v-.997h-3.75v.997a1.665 1.665 0 1 1-3.33 0v-1.11a2.01 2.01 0 0 1-1.335-1.89V7.65h-.646v1.995a.667.667 0 0 1-1.327.105v-2.1a1.343 1.343 0 0 1 1.23-1.335h.75A3.33 3.33 0 0 1 9.075 3h6.405ZM9.075 18.315h-.667v.997a.338.338 0 0 0 .667.06v-1.057Zm7.065 0h-.66v.997a.33.33 0 0 0 .545.259.337.337 0 0 0 .115-.199v-1.057Zm-9.06-5.648v3.646a.675.675 0 0 0 .585.667h9.143a.667.667 0 0 0 .667-.585v-3.75a14.287 14.287 0 0 1-10.395.023Zm1.732 1.178a.668.668 0 0 1 .668.667v1.073a.667.667 0 1 1-1.335 0v-1.073a.668.668 0 0 1 .668-.667Zm6.93 0a.668.668 0 0 1 .668.667v1.073a.667.667 0 1 1-1.335 0v-1.073a.668.668 0 0 1 .668-.667Zm-.262-9.532H9.075A1.995 1.995 0 0 0 7.08 6.195v5.055a12.982 12.982 0 0 0 10.388 0V6.315a2.003 2.003 0 0 0-1.988-2.002Zm-.645 1.335a.66.66 0 0 1 .645.667.653.653 0 0 1-.57.66H9.72a.668.668 0 0 1-.075-1.327h5.19Z"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                            <p class="fs-5" href="#" style="min-width: max-content">Bus</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="border-bottom border-2 w-100 d-block d-md-none"></li>
                                <li class="nav-item col-lg-2 col-md-4 col-sm-6 col-12 center  border-start border-xs-none border-md-none border-2 d-flex text-center  ">
                                    <a class="page-link  default-cursor d-flex justify-content-center w-100" href="#">
                                        <div
                                            class="w-75 rounded-3 pointer-cursor card-header-items-hover services flex-column center hotel"
                                            @click="pageChanger('hotel'),changeActiveTitle() ">
                                            <svg viewBox="0 0 24 24" width="36px" height="36px" class="mt-3"
                                                 fill="currentColor"
                                                 data-v-554c8425="">
                                                <path
                                                    d="M14.655 3.75a.675.675 0 0 1 .67.59l.005.085h2.595A2.175 2.175 0 0 1 20.1 6.6v12.067a1.425 1.425 0 0 1-1.425 1.425H5.107c-.75 0-1.357-.607-1.357-1.357v-7.966a2.228 2.228 0 0 1 2.047-2.242v-.015a.675.675 0 0 1 1.345-.085l.005.085v.007h2.738v-1.92a2.175 2.175 0 0 1 2.047-2.17v-.004a.675.675 0 0 1 1.345-.085l.006.085h.697a.674.674 0 0 1 .675-.675Zm-4.77 6.12H5.97a.877.877 0 0 0-.545.196l-.073.067a.879.879 0 0 0-.251.63v7.972c0 .003.003.007.007.007h4.778V9.87h-.001Zm2.712-4.096h-.537a.825.825 0 0 0-.825.826v12.142h2.063v-1.305a1.425 1.425 0 0 1 1.313-1.42l.111-.005h.548c.788 0 1.425.638 1.425 1.425v1.304l1.98.001a.07.07 0 0 0 .052-.022l.017-.023.006-.03V6.6a.825.825 0 0 0-.825-.825h-3.27l-.01-.001h-2.048Zm2.673 11.588h-.547a.075.075 0 0 0-.075.075v1.304h.697v-1.304a.075.075 0 0 0-.023-.052l-.023-.017-.029-.006Zm-6.758-.99a.675.675 0 0 1 .085 1.345l-.085.005h-2.04a.676.676 0 0 1-.084-1.345l.084-.005h2.04Zm0-2.76a.675.675 0 0 1 .085 1.345l-.085.005h-2.04a.676.676 0 0 1-.084-1.345l.084-.005h2.04Zm5.46-.322a.675.675 0 0 1 .085 1.345l-.085.005h-1.364a.676.676 0 0 1-.085-1.345l.085-.005h1.364Zm3.406 0a.675.675 0 0 1 .084 1.345l-.084.005h-1.366a.676.676 0 0 1-.084-1.345l.084-.005h1.366Zm-8.866-2.438a.675.675 0 0 1 .085 1.345l-.085.005h-2.04a.676.676 0 0 1-.084-1.345l.084-.005h2.04Zm5.46-.292a.675.675 0 0 1 .085 1.345l-.085.005h-1.364a.676.676 0 0 1-.085-1.345l.085-.005h1.364Zm3.406 0a.675.675 0 0 1 .084 1.345l-.084.005h-1.366a.676.676 0 0 1-.084-1.345l.084-.005h1.366Zm-3.405-2.723a.675.675 0 0 1 .084 1.345l-.085.005h-1.364a.675.675 0 0 1-.085-1.344l.085-.006h1.364Zm3.405 0a.675.675 0 0 1 .084 1.345l-.084.005h-1.366a.675.675 0 0 1-.084-1.344l.084-.006h1.366Z"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                            <p class="fs-5" href="#" style="min-width: max-content">Hotel</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="border-bottom border-2 w-100 d-md-block d-block d-sm-none d-lg-none"></li>
                                <li class="nav-item col-lg-2 col-md-4 col-sm-6 col-12 center  border-start border-xs-none border-2 border-lg-none d-flex  text-center ">
                                    <a class="page-link center w-100 default-cursor d-flex justify-content-center"
                                       href="#">
                                        <div
                                            class="w-75  card-header-items-hover services flex-column pointer-cursor center tour"
                                            @click="pageChanger('tour'),changeActiveTitle() ">
                                            <svg viewBox="0 0 24 24" width="36px" height="36px" class="mt-3"
                                                 fill="currentColor"
                                                 data-v-554c8425="">
                                                <path
                                                    d="M12 3a3.376 3.376 0 0 1 3.351 3H16.5a2.25 2.25 0 0 1 2.25 2.25v3.095A3.001 3.001 0 0 1 21 14.25v2.25a1.5 1.5 0 0 1-1.5 1.5h-.75a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3H4.5a1.5 1.5 0 0 1-1.496-1.388L3 16.5v-2.25a3 3 0 0 1 2.25-2.902V8.25A2.25 2.25 0 0 1 7.5 6h1.146A3.375 3.375 0 0 1 12 3Zm5.25 9-.997.75a3.75 3.75 0 0 1-2.002.742l-.001.758a.75.75 0 0 1-1.495.088l-.005-.088v-.75h-1.5v.75a.75.75 0 0 1-1.495.088l-.005-.088v-.758a3.75 3.75 0 0 1-1.838-.625l-.165-.117L6.75 12v6a1.5 1.5 0 0 0 1.388 1.496l.112.004h7.5a1.5 1.5 0 0 0 1.5-1.5v-6Zm-3 4.5a.75.75 0 0 1 .088 1.495L14.25 18h-4.5a.75.75 0 0 1-.087-1.495l.087-.005h4.5Zm4.5-3.548V16.5h.75v-2.25a1.5 1.5 0 0 0-.683-1.258l-.066-.04Zm-13.5-.001-.056.033a1.5 1.5 0 0 0-.69 1.153l-.004.113v2.25h.75v-3.549ZM16.5 7.5h-9a.75.75 0 0 0-.75.75v1.875l1.898 1.425a2.25 2.25 0 0 0 1.102.436v-.736a.75.75 0 0 1 1.495-.088l.005.088V12h1.5v-.75a.75.75 0 0 1 1.495-.088l.005.088v.736a2.25 2.25 0 0 0 .97-.344l.132-.092 1.898-1.425V8.25a.75.75 0 0 0-.663-.745L16.5 7.5Zm-4.5-3c-.911 0-1.67.65-1.84 1.493L10.158 6h3.68l-.025-.104a1.876 1.876 0 0 0-1.69-1.392L12 4.5Z"></path>
                                            </svg>
                                            <p class="fs-5 " href="#" style="min-width: max-content">Tours</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="border-bottom border-2 w-100 d-block d-md-none"></li>
                                <li class="nav-item col-lg-2 col-md-4 col-sm-6 col-12 center border-start border-xs-none border-2 border-md-none d-flex  text-center ">
                                    <a class="page-link center w-100 default-cursor d-flex justify-content-center"
                                       href="#">
                                        <div
                                            class="w-75  card-header-items-hover services flex-column pointer-cursor center outerfly"
                                            @click="pageChanger('outerfly'),changeActiveTitle()">
                                            <svg viewBox="0 0 24 24" width="36px" height="36px" class="mt-3"
                                                 fill="currentColor"
                                                 data-v-554c8425="">
                                                <path
                                                    d="M6.975 4.505a2.002 2.002 0 0 1 3-.15c.126.1.246.208.36.322l.18.188 2.76 3.052 1.012-.277v-.165a.668.668 0 0 1 .06-.24l.038-.075a3.72 3.72 0 0 1 .713-.863 1.56 1.56 0 0 1 2.204-.06l.42.428 1.973-.563a2.317 2.317 0 0 1 2.197.45l.105.09.053.053a1.327 1.327 0 0 1-.3 2.197h-.052l-5.25 2.438 2.25 2.475.99-.413a1.5 1.5 0 0 1 1.897.405l.067.09a1.5 1.5 0 0 1-.247 1.965l-3.082 3.075a1.523 1.523 0 1 1-2.468-1.785l-.037.06.472-1.035-2.475-2.25-2.43 5.25v.068a1.334 1.334 0 0 1-2.205.315l-.053-.053a2.25 2.25 0 0 1-.532-.93 5.4 5.4 0 0 0 1.32-1.042v.082a.99.99 0 0 0 .203.953h.044v.052-.037l2.813-6.12a.676.676 0 0 1 1.072-.218l3.518 3.218a.668.668 0 0 1 .157.75l-.69 1.5-.075.135a.173.173 0 0 0 .194.222.163.163 0 0 0 .107-.072l.082-.098 3.157-3.157a.172.172 0 0 0 0-.218.188.188 0 0 0-.247-.037l-1.5.697a.674.674 0 0 1-.75-.157l-3.225-3.428A.674.674 0 0 1 15 10.527l6.105-2.82h.052l-.06-.06a1.012 1.012 0 0 0-1.02-.255l-2.37.675a.675.675 0 0 1-.66-.172l-.682-.683c-.082-.075-.21-.067-.33.053l-.113.105c-.075.075-.142.157-.21.232l-.075.105a.376.376 0 0 0 0 .09l.045.165a.683.683 0 0 1-.48.75l-1.987.555a.675.675 0 0 1-.675-.195l-3-3.292-.255-.255-.105-.105-.105-.09c-.457-.375-.75-.39-1.17.06-.42.45-.39.547-.3.787.12.244.289.46.495.638l.188.18 3.3 3a.682.682 0 0 1 .187.682l-.525 2.108a5.437 5.437 0 0 0-.832-1.988 5.445 5.445 0 0 0-1.785-1.65L7.395 8.052a3.57 3.57 0 0 1-.975-1.215l-.045-.105a2.002 2.002 0 0 1 .6-2.227Zm-1.072 4.95a4.403 4.403 0 1 1 0 8.805 4.403 4.403 0 0 1 0-8.805Zm.93 4.942h-1.86c.032.73.195 1.45.48 2.123.09.22.222.422.39.592l.06.053.097-.023c.167-.17.3-.371.39-.592a6.157 6.157 0 0 0 .442-2.153Zm-2.948 0h-1.26a3.345 3.345 0 0 0 1.777 2.423 7.418 7.418 0 0 1-.517-2.423Zm5.295 0H7.92a7.629 7.629 0 0 1-.51 2.423 3.338 3.338 0 0 0 1.77-2.423Zm-4.785-3.502a3.353 3.353 0 0 0-1.77 2.422h1.26c.037-.83.21-1.648.51-2.422Zm3 0 .045.112c.271.743.428 1.521.465 2.31h1.26a3.338 3.338 0 0 0-1.755-2.422h-.015Zm-1.5-.353-.06.06c-.167.17-.3.372-.39.593a6.157 6.157 0 0 0-.48 2.122h1.867a6.157 6.157 0 0 0-.48-2.122A1.83 1.83 0 0 0 6 10.602l-.105-.06Z"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                            <p class="fs-5" style="min-width: max-content" href="#">outer flight</p>
                                        </div>
                                    </a>
                                </li>
                                </li>
                                <li class="border-bottom border-2 w-100 d-block d-sm-none"></li>
                                <li class="nav-item col-lg-2 col-md-4 col-sm-6 col-12 center  border-start border-xs-none border-2 d-flex text-center">
                                    <a class="page-link center w-100 default-cursor d-flex justify-content-center"
                                       href="#">
                                        <div
                                            class="w-75 pointer-cursor center services flex-column  activedTitle innerfly"
                                            @click="pageChanger('innerfly'),changeActiveTitle()">
                                            <svg viewBox="0 0 24 24" width="36px" height="36px" class="mt-3"
                                                 fill="currentColor"
                                                 data-v-554c8425="">
                                                <path
                                                    d="M5.557 5.565c.45-.45.713-.435 1.163-.06l.105.09a.75.75 0 0 1 .112.105l.255.255 3 3.293a.667.667 0 0 0 .675.195l1.988-.555a.682.682 0 0 0 .48-.75l-.045-.165a.376.376 0 0 1 0-.09l.075-.105c.067-.075.135-.158.21-.233l.113-.105c.12-.12.247-.127.33-.052l.682.682a.667.667 0 0 0 .66.173l2.37-.675a1.013 1.013 0 0 1 .982.217l.06.06h-.052l-6.105 2.82a.676.676 0 0 0-.217 1.065l3.217 3.525a.667.667 0 0 0 .75.158l1.5-.698a.188.188 0 0 1 .248.038.173.173 0 0 1 0 .217L15 18.098l-.082.097a.165.165 0 0 1-.233.045.172.172 0 0 1-.068-.195l.075-.135.69-1.5a.668.668 0 0 0-.157-.75l-3.518-3.217a.674.674 0 0 0-1.072.217l-2.85 6.09-.045-.052h-.038a1.012 1.012 0 0 1-.202-.96l.682-2.385a.667.667 0 0 0-.172-.66l-.698-.705a.187.187 0 0 1 0-.263l.12-.127a2.36 2.36 0 0 1 .24-.218l.105-.075h.18a.674.674 0 0 0 .863-.45l.57-2.01a.683.683 0 0 0-.195-.682l-3.293-3-.187-.18a1.92 1.92 0 0 1-.465-.63c-.09-.24 0-.45.3-.788h.007Zm10.373 13.5 3.082-3.075a1.5 1.5 0 0 0 .24-1.965l-.06-.09a1.5 1.5 0 0 0-1.875-.435l-1.035.473-2.25-2.475 5.25-2.438h.06a1.328 1.328 0 0 0 .33-2.205l-.044-.105-.128-.09a2.318 2.318 0 0 0-2.198-.45l-1.95.54-.42-.427a1.56 1.56 0 0 0-2.182.082 3.761 3.761 0 0 0-.75.863v.075a.668.668 0 0 0-.06.24v.165l-1.012.277-2.806-3.052-.18-.188a4.337 4.337 0 0 0-.36-.285 2.002 2.002 0 0 0-3 .15 1.995 1.995 0 0 0-.6 2.25l.045.105c.23.474.563.889.975 1.215l3 2.753-.3 1.035h-.165a.646.646 0 0 0-.307.097 3.54 3.54 0 0 0-.75.585l-.24.248a1.553 1.553 0 0 0 .06 2.047l.435.443-.563 1.987a2.325 2.325 0 0 0 .533 2.25l.052.053A1.327 1.327 0 0 0 9 19.365v-.067l2.43-5.25 2.475 2.25-.473 1.035.068-.083a1.516 1.516 0 1 0 2.453 1.778"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                            <p class="fs-5" style="min-width: max-content">inner flight</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex dropdowns-place mb-4 px-5">
                                    <div x-show="page==='innerfly'">
                                        <div class="dropdown dropdown-center"
                                             x-data="{valueSetter(){innerflyPageDropsVal.howToFly=event.target.textContent}}">
                                            <button class=" btn border  dropdown-toggle" data-bs-toggle="dropdown"
                                                    x-text="innerflyPageDropsVal.howToFly"
                                            ></button>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item pointer-cursor"
                                                    @click="valueSetter(),isBackAndForth=false"
                                                    href="#">one sided
                                                </li>
                                                <li class="dropdown-divider"></li>
                                                <li class="dropdown-item pointer-cursor"
                                                    @click="valueSetter(),isBackAndForth=true"
                                                    href="#">back and forth
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div x-show="page==='outerfly'">
                                        <div class="d-flex">
                                            <div class="dropdown me-4 dropdown-center"
                                                 x-data="{value:'Back and forth',valueSetter(){this.value=event.target.textContent}}">
                                                <button class="btn border  dropdown-toggle" data-bs-toggle="dropdown"
                                                        x-text="value"></button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">One sided
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Back and forth
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Multi-rou1te
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown dropdown-center"
                                                 x-data="{value:'Economy',valueSetter(){this.value=event.target.textContent}}">
                                                <button class="btn border  dropdown-toggle" data-bs-toggle="dropdown"
                                                        x-text="value"></button>
                                                <ul class="dropdown-menu overflow-auto" style="height: 15rem;">
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Economy
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Premium economy
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Business
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Premium business
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">First class
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Premium first class
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="page==='train'">
                                        <div class="d-flex">
                                            <div class="dropdown me-4    dropdown-center"
                                                 x-data="{value:'One sided',valueSetter(){this.value=event.target.textContent}}">
                                                <button class="btn border  dropdown-toggle" data-bs-toggle="dropdown"
                                                        x-text="value"></button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">One sided
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Back and forth
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown me-4    dropdown-center"
                                                 x-data="{value:'I do not want shutter',valueSetter(){this.value=event.target.textContent}}">
                                                <button class="btn border  dropdown-toggle" data-bs-toggle="dropdown"
                                                        x-text="value"></button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">I do not want shutter
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">I do want shutter
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown me-4    dropdown-center"
                                                 x-data="{value:'Ordinary passengers',valueSetter(){this.value=event.target.textContent}}">
                                                <button class="btn border  dropdown-toggle" data-bs-toggle="dropdown"
                                                        x-text="value"></button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Ordinary passengers
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Brothers
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">Sisters
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown dropdown-center"
                                                 x-data="{value:'I do not want to transport a car',valueSetter(){this.value=event.target.textContent}}">
                                                <button class="btn border  dropdown-toggle" data-bs-toggle="dropdown"
                                                        x-text="value"></button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">I do not want to transport a car
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="dropdown-item pointer-cursor" @click="valueSetter()"
                                                        href="#">I do want to transport a car
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="page==='bus'">
                                        <div class="mb-4"></div>
                                    </div>
                                    <div x-show="page==='tour'">
                                        <div class="mb-4"></div>
                                    </div>
                                    <div x-show="page==='hotel'">
                                        <div class="mb-4"></div>
                                    </div>
                                </div>
                                <div x-show="page==='innerfly'">
                                    <div x-data="orgAndDes" x-init="citySetter()">
                                        <div x-data="calendar" x-init="">
                                            <div class="input-group d-flex justify-content-center has-validation">
                                                <div class="col-lg-4 col-11 input-group-custom d-flex ms-2">
                                                    <div class="col-5 mb-lg-0 mb-4 ms-lg-0">
                                                        <input type="text"
                                                               x-model="value.originValue"
                                                               :class="(isInvalid[0])&&'is-invalid was-validated form-control:invalid invalid-Placeholder'"
                                                               class=" form-control-lg form-control rounded-end-0 origin"
                                                               placeholder="Origin"
                                                               @click.outside="inputClickOutside(0,'destination','originValue')"
                                                               @click="()=>{if(dropdownOpenFirst){dropdownMenuSwitch('0','origin',false,0,'originValue')}else{dropdownMenuSwitch(['dropdown-menu-moveback','dropdown-menu-move'],'origin',true,0,'originValue')}}"
                                                               x-ref="Origin" @keyup="inputKeyUp(0)"
                                                               @keyup.down="selectNextCity"
                                                               @keyup.enter="chooseCity()"
                                                               @keyup.up="selectPrevCity"
                                                               @keydown.tab="dropdownMenuSwitch(['dropdown-menu-move','dropdown-menu-moveback'],'origin',true,0,'originValue'),inputTab('origin',0),valueFixer('originValue',0)">
                                                        <div class="invalid-feedback" x-show="isInvalid[0]">
                                                            Please choose the origin.
                                                        </div>
                                                        <ul class="dropdown-menu-displayless overflow-auto suggestion-cities"
                                                            x-ref="dropdownMenu" x-show="open"
                                                            @click.outside="dropdownMenuClickOutside,cityIndex=''"
                                                            :style="dropdownStyle">
                                                            <template x-for="city in settedCities"
                                                                      x-ref="citiesTemplate">
                                                                <div>
                                                                    <li class="dropdown-item city pointer-cursor"
                                                                        href="#" x-text="city"
                                                                        :class="(settedCities[cityIndex]===city)&&'selected-city'"
                                                                        @click="valueSetter(city),cityDropdownMover()">
                                                                    </li>
                                                                    <li class="dropdown-divider"
                                                                        :class="(city===settedCities[settedCities.length - 1])&&'d-none'"></li>
                                                                </div>
                                                            </template>
                                                            <template x-if="settedCities.length<1">
                                                                <li class="text-center">
                                                                    Nothing found
                                                                </li>
                                                            </template>
                                                        </ul>
                                                    </div>
                                                    <span x-bind="valueMover"
                                                          class="input-group-text pointer-cursor col-2 rounded-0 d-flex justify-content-center"
                                                          style="height: 3rem">
                                <svg viewBox="0 0 24 24" width="2rem" fill="currentColor"><path
                                        d="m16.96 12.157.07.063 3.75 3.75a.757.757 0 0 1 .06.067l-.06-.067a.748.748 0 0 1 .22.53v.025a.728.728 0 0 1-.003.039L21 16.5a.747.747 0 0 1-.147.446l-.01.014-.008.01-.055.06-3.75 3.75a.75.75 0 0 1-1.123-.99l.063-.07 2.469-2.47H8.25a.75.75 0 0 1-.087-1.495l.087-.005h10.189l-2.47-2.47a.75.75 0 0 1-.062-.99l.063-.07a.75.75 0 0 1 .99-.063ZM8.03 3.22a.75.75 0 0 1 .063.99l-.063.07-2.47 2.47h10.19a.75.75 0 0 1 .088 1.495l-.088.005H5.56l2.47 2.47a.75.75 0 0 1 .063.99l-.063.07a.75.75 0 0 1-.99.063l-.07-.063-3.75-3.75-.055-.06a.644.644 0 0 1-.005-.007l.06.067A.756.756 0 0 1 3 7.5v-.014a.47.47 0 0 1 .003-.053L3 7.5a.756.756 0 0 1 .22-.53l3.75-3.75a.75.75 0 0 1 1.06 0Z"></path></svg>
                            </span>
                                                    <div class="col-5 has-validation">
                                                        <input type="text"
                                                               class="form-control-lg form-control ps-4 rounded-start-0 valueSetter destination"
                                                               placeholder="Destination" x-ref="Destination"
                                                               x-model="value.destinationValue"
                                                               @click.outside="inputClickOutside(1,'origin','destinationValue')"
                                                               :class="(isInvalid[1])&&'is-invalid was-validated form-control:invalid invalid-Placeholder'"
                                                               @keyup="inputKeyUp(1)"
                                                               @keyup.up="selectPrevCity"
                                                               @keyup.enter="chooseCity()"
                                                               @keyup.down="selectNextCity"
                                                               @keydown.tab="dropdownMenuSwitch(['dropdown-menu-moveback','dropdown-menu-move'],'destination',true,1,'destinationValue'),inputTab('destination',0)"
                                                               @click="()=>{if(dropdownOpenFirst){dropdownMenuSwitch(244,'destination',false,1,'destinationValue')}else{dropdownMenuSwitch(['dropdown-menu-move','dropdown-menu-moveback'],'destination',true,1,'destinationValue')}}">
                                                        <div class="invalid-feedback" x-show="isInvalid[1]">
                                                            choose the destination
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-11 ms-2 d-flex mb-lg-0 mb-4" @click="calendarOpen=true">
                                                    <label class="w-50">
                                                        <input type="text"
                                                               class="departureInput form-control-lg form-control rounded-end-0 "
                                                               placeholder="Departure date"
                                                               x-model="selectedDayInputVal[0]"
                                                               @keydown.prevent=''
                                                        >
                                                    </label>
                                                    <label class="position-relative  w-50"  @click="calendarOpen=true">
                                                        <input type="text"
                                                               class="returnInput form-control-lg form-control rounded-start-0"
                                                               :disabled="(checkSelectedDaysPos)"
                                                               placeholder="Return date"
                                                               x-ref="returnInput"
                                                               x-model="selectedDayInputVal[1]"
                                                               @keydown.prevent=""
                                                        >
                                                        <span class="coming-input-label-disable backAndForthToggler"
                                                              @click="isBackAndForth=!isBackAndForth,checkSelectedDaysPos"
                                                        ></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-2 col-11 ms-2 mb-lg-0 mb-4">
                                                    <input type="text" class=" form-control-lg form-control"
                                                           value="1 passenger">
                                                </div>
                                                <div class="col-lg-1 col-11 ms-2">
                                <span class="d-grid">
                                    <button class="btn btn-primary btn-lg text-white">Search</button>
                                </span>
                                                </div>
                                            </div>
                                            <div class="bg-white rounded border carousel slide position-absolute p-4" id="calendar" x-show="calendarOpen"
                                                 style="width: 450px;z-index: 100;left: 36.5%"
                                                 @click.outside="closeCalendar"
                                            >
                                                <div class="carousel-inner">
                                                    <div class="d-flex justify-content-center p-3 align-items-baseline">
                                                        <p class="fs-4" x-text="calendarTitle" x-init=""></p>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <div
                                                            class="d-flex p-3 justify-content-between align-items-baseline position-relative w-75"
                                                            style="bottom: 1.5rem;">
                                                                <span
                                                                    x-ref="prevMonth"
                                                                    class="user-select-none border border-dark material-symbols-outlined rounded-circle center position-absolute top-0 bottom-0 start-0  disabled"
                                                                    style="font-family: 'Poppins', sans-serif;width: 38px;height: 38px"
                                                                    @click="if($el.classList.contains('disabled')===false&&isSliding===false){setDays(-1),activatedDaysShow(),betweenSelectedDays(),isSliding=true,isSlidingToggle(300)}setRequiresInput(1,'next')">
                                                                    <</span>
                                                            <span
                                                                x-ref="nextMonth"
                                                                data-bs-slide="next"
                                                                data-bs-target="#calendar"
                                                                class="month-mover-hover user-select-none border position-absolute top-0 bottom-0 end-0 border-dark material-symbols-outlined rounded-circle center pointer-cursor ms-2"
                                                                style="font-family: 'Poppins', sans-serif;width: 38px;height: 38px"
                                                                @click="if($el.classList.contains('disabled')===false&&isSliding===false){setDays(1),activatedDaysShow(),betweenSelectedDays(),isSliding=true,isSlidingToggle(300)}setRequiresInput(0,'prev'),firstTimeSelecting=false">></span>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-items-parent">
                                                        <ul class="d-flex p-0 fw-bold">
                                                            <li class="list-group-item text-center"
                                                                style="width: calc(100% /7)">Sun
                                                            </li>
                                                            <li class="list-group-item text-center"
                                                                style="width: calc(100% /7)">Mon
                                                            </li>
                                                            <li class="list-group-item text-center"
                                                                style="width: calc(100% /7)">Tue
                                                            </li>
                                                            <li class="list-group-item text-center"
                                                                style="width: calc(100% /7)">Wed
                                                            </li>
                                                            <li class="list-group-item text-center"
                                                                style="width: calc(100% /7)">Thu
                                                            </li>
                                                            <li class="list-group-item text-center"
                                                                style="width: calc(100% /7)">Fri
                                                            </li>
                                                            <li class="list-group-item text-center"
                                                                style="width: calc(100% /7)">Sat
                                                            </li>
                                                        </ul>
                                                        <div class="carousel-item">
                                                            <ul class="d-flex flex-wrap p-0">
                                                                <template x-for="day in daysOfLastMonth[0]">
                                                                    <li class=" list-group-item user-select-none  text-center mb-3 text-muted  default-cursor"
                                                                        style="z-index: 1;width: calc(100% / 7)"
                                                                        x-init="">
                                                                        <span class=""></span>
                                                                    </li>
                                                                </template>
                                                                <template x-for="day in daysOfThisMonth[0]">
                                                                    <li class="list-group-item user-select-none  text-center  mb-3 calendar-days-before calendar-day position-relative"
                                                                        style="z-index: 1;width: calc(100% / 7)"
                                                                        :class="(day.isPass===false)&&'pointer-cursor calendar-days-before-hover'"
                                                                        @click="setActive()" x-show="day.isShow"
                                                                        >
                                                                        <span x-text="daysOfThisMonth[0].indexOf(day)+1"
                                                                              class="" style="width: 1.5rem;"
                                                                              :class="day.isPass&&'past-day text-muted'"></span>

                                                                    </li>
                                                                </template>
                                                                <template x-for="day in daysOfNextMonth[0]">
                                                                    <li class=" list-group-item  user-select-none text-center mb-3 text-muted default-cursor"
                                                                        style="z-index: 1;width: calc(100% / 7)"
                                                                    >
                                                                    </li>
                                                                </template>
                                                            </ul>
                                                        </div>
                                                        <div class="carousel-item active">
                                                            <ul class="d-flex flex-wrap p-0">
                                                                <template x-for="day in daysOfLastMonth[1]">
                                                                    <li class=" list-group-item user-select-none  text-center mb-3 text-muted  default-cursor"
                                                                        style="z-index: 1;width: calc(100% / 7)">
                                                                        <span class=""></span>
                                                                    </li>
                                                                </template>
                                                                <template x-for="day in daysOfThisMonth[1]">
                                                                    <li class="list-group-item user-select-none text-center  mb-3 calendar-days-before calendar-day position-relative"
                                                                        style="z-index: 1;width: calc(100% / 7);"
                                                                        :class="(day.isPass===false)&&'pointer-cursor calendar-days-before-hover'"
                                                                        @click="setActive()"
                                                                        x-show="day.isShow"
                                                                    >
                                                                        <span x-text="daysOfThisMonth[1].indexOf(day)+1"
                                                                              class="" style="width: 1.5rem;"
                                                                              :class="day.isPass&&'past-day text-muted'"></span>

                                                                    </li>
                                                                </template>
                                                                <template x-for="day in daysOfNextMonth[1]">
                                                                    <li class=" list-group-item  user-select-none text-center mb-3 text-muted default-cursor"
                                                                        style="z-index: 1;width: calc(100% / 7)"
                                                                    >
                                                                    </li>
                                                                </template>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center"
                                                     style="border-top: 1px solid #eee">
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between mb-1"
                                                        style="height: 3rem;">
                                                        <a class="link-primary text-decoration-none pointer-cursor"
                                                           @click="goToday()">go
                                                            to today</a>
                                                        <button class="btn btn-primary text-white opacity-50 cursor-not-allowed"
                                                                x-ref="submitCalendarBtn"
                                                                @click="submitCalendar">submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="page==='outerfly'">
                                    <div class="input-group d-flex justify-content-center">
                                        <div class="col-lg-4 col-11 input-group-custom d-flex ms-2">
                                            <div class="col-5 mb-lg-0 mb-4 ms-lg-0">
                                                <input type="text" class=" form-control-lg form-control rounded-end-0"
                                                       placeholder="Origin">
                                            </div>
                                            <span
                                                class="input-group-text pointer-cursor col-2 rounded-0 d-flex justify-content-center"
                                                style="height: 3rem">
                                <svg viewBox="0 0 24 24" width="2rem" fill="currentColor"><path
                                        d="m16.96 12.157.07.063 3.75 3.75a.757.757 0 0 1 .06.067l-.06-.067a.748.748 0 0 1 .22.53v.025a.728.728 0 0 1-.003.039L21 16.5a.747.747 0 0 1-.147.446l-.01.014-.008.01-.055.06-3.75 3.75a.75.75 0 0 1-1.123-.99l.063-.07 2.469-2.47H8.25a.75.75 0 0 1-.087-1.495l.087-.005h10.189l-2.47-2.47a.75.75 0 0 1-.062-.99l.063-.07a.75.75 0 0 1 .99-.063ZM8.03 3.22a.75.75 0 0 1 .063.99l-.063.07-2.47 2.47h10.19a.75.75 0 0 1 .088 1.495l-.088.005H5.56l2.47 2.47a.75.75 0 0 1 .063.99l-.063.07a.75.75 0 0 1-.99.063l-.07-.063-3.75-3.75-.055-.06a.644.644 0 0 1-.005-.007l.06.067A.756.756 0 0 1 3 7.5v-.014a.47.47 0 0 1 .003-.053L3 7.5a.756.756 0 0 1 .22-.53l3.75-3.75a.75.75 0 0 1 1.06 0Z"></path></svg>
                            </span>
                                            <div class="col-5">
                                                <input type="text"
                                                       class="form-control-lg form-control ps-4 rounded-start-0"
                                                       placeholder="Destination">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-11 ms-2 d-flex mb-lg-0 mb-4">
                                            <label class="w-50">
                                                <input type="text" class=" form-control-lg form-control rounded-end-0"
                                                       placeholder="Departure date">
                                            </label>
                                            <label class="position-relative coming-input-label-enable w-50">
                                                <input type="text" class=" form-control-lg form-control rounded-start-0"
                                                       placeholder="Return date">
                                            </label>
                                        </div>
                                        <div class="col-lg-2 col-11 ms-2 mb-lg-0 mb-4">
                                            <input type="text" class=" form-control-lg form-control"
                                                   value="1 passenger">
                                        </div>
                                        <div class="col-lg-1 col-11 ms-2">
                                <span class="d-grid">
                                    <button class="btn btn-primary btn-lg text-white">Search</button>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="page==='tour'">
                                    <div class="input-group d-flex justify-content-center">
                                        <div class="col-lg-4 col-11 input-group-custom d-flex ms-2">
                                            <div class="col-5 mb-lg-0 mb-4 ms-lg-0">
                                                <input type="text" class=" form-control-lg form-control rounded-end-0"
                                                       placeholder="Origin">
                                            </div>
                                            <span
                                                class="input-group-text pointer-cursor col-2 rounded-0 d-flex justify-content-center"
                                                style="height: 3rem">
                                <svg viewBox="0 0 24 24" width="2rem" fill="currentColor"><path
                                        d="m16.96 12.157.07.063 3.75 3.75a.757.757 0 0 1 .06.067l-.06-.067a.748.748 0 0 1 .22.53v.025a.728.728 0 0 1-.003.039L21 16.5a.747.747 0 0 1-.147.446l-.01.014-.008.01-.055.06-3.75 3.75a.75.75 0 0 1-1.123-.99l.063-.07 2.469-2.47H8.25a.75.75 0 0 1-.087-1.495l.087-.005h10.189l-2.47-2.47a.75.75 0 0 1-.062-.99l.063-.07a.75.75 0 0 1 .99-.063ZM8.03 3.22a.75.75 0 0 1 .063.99l-.063.07-2.47 2.47h10.19a.75.75 0 0 1 .088 1.495l-.088.005H5.56l2.47 2.47a.75.75 0 0 1 .063.99l-.063.07a.75.75 0 0 1-.99.063l-.07-.063-3.75-3.75-.055-.06a.644.644 0 0 1-.005-.007l.06.067A.756.756 0 0 1 3 7.5v-.014a.47.47 0 0 1 .003-.053L3 7.5a.756.756 0 0 1 .22-.53l3.75-3.75a.75.75 0 0 1 1.06 0Z"></path></svg>
                            </span>
                                            <div class="col-5">
                                                <input type="text"
                                                       class="form-control-lg form-control ps-4 rounded-start-0"

                                                       placeholder="Destination">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-11 ms-2 d-flex mb-lg-0 mb-4">
                                            <label class="w-50">
                                                <input type="text" class=" form-control-lg form-control rounded-end-0"
                                                       placeholder="Departure date">
                                            </label>
                                            <label class="position-relative  w-50">
                                                <input type="text" class=" form-control-lg form-control rounded-start-0"
                                                       placeholder="Return date">
                                            </label>
                                        </div>
                                        <div class="col-lg-2 col-11 ms-2 mb-lg-0 mb-4">
                                            <input type="text" class=" form-control-lg form-control"
                                                   value="2 passenger,1 room">
                                        </div>
                                        <div class="col-lg-1 col-11 ms-2">
                                <span class="d-grid">
                                    <button class="btn btn-primary btn-lg text-white">Search</button>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="page==='hotel'">
                                    <div class="input-group d-flex justify-content-center">
                                        <div class="col-lg-4 col-11 input-group-custom d-flex ms-2">
                                            <div class="col-12 mb-lg-0 mb-4 ms-lg-0">
                                                <input type="text" class=" form-control-lg form-control rounded-end-0"
                                                       placeholder="Destination or hotel">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-11 ms-2 d-flex mb-lg-0 mb-4">
                                            <label class="w-50">
                                                <input type="text" class=" form-control-lg form-control rounded-end-0"
                                                       placeholder="Departure date">
                                            </label>
                                            <label class="position-relative  w-50">
                                                <input type="text" class=" form-control-lg form-control rounded-start-0"
                                                       placeholder="Return date">
                                            </label>
                                        </div>
                                        <div class="col-lg-2 col-11 ms-2 mb-lg-0 mb-4">
                                            <input type="text" class=" form-control-lg form-control"
                                                   value="1 passenger,1 room">
                                        </div>
                                        <div class="col-lg-1 col-11 ms-2">
                                <span class="d-grid">
                                    <button class="btn btn-primary btn-lg text-white">Search</button>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="page==='bus'">
                                    <div class="input-group d-flex justify-content-center">
                                        <div class="col-lg-6 col-11 input-group-custom d-flex ms-2">
                                            <div class="col-5 mb-lg-0 mb-4 ms-lg-0">
                                                <input type="text" class=" form-control-lg form-control rounded-end-0"
                                                       placeholder="Origin">
                                            </div>
                                            <span
                                                class="input-group-text pointer-cursor col-2 rounded-0 d-flex justify-content-center"
                                                style="height: 3rem">
                                <svg viewBox="0 0 24 24" width="2rem" fill="currentColor"><path
                                        d="m16.96 12.157.07.063 3.75 3.75a.757.757 0 0 1 .06.067l-.06-.067a.748.748 0 0 1 .22.53v.025a.728.728 0 0 1-.003.039L21 16.5a.747.747 0 0 1-.147.446l-.01.014-.008.01-.055.06-3.75 3.75a.75.75 0 0 1-1.123-.99l.063-.07 2.469-2.47H8.25a.75.75 0 0 1-.087-1.495l.087-.005h10.189l-2.47-2.47a.75.75 0 0 1-.062-.99l.063-.07a.75.75 0 0 1 .99-.063ZM8.03 3.22a.75.75 0 0 1 .063.99l-.063.07-2.47 2.47h10.19a.75.75 0 0 1 .088 1.495l-.088.005H5.56l2.47 2.47a.75.75 0 0 1 .063.99l-.063.07a.75.75 0 0 1-.99.063l-.07-.063-3.75-3.75-.055-.06a.644.644 0 0 1-.005-.007l.06.067A.756.756 0 0 1 3 7.5v-.014a.47.47 0 0 1 .003-.053L3 7.5a.756.756 0 0 1 .22-.53l3.75-3.75a.75.75 0 0 1 1.06 0Z"></path></svg>
                            </span>
                                            <div class="col-5">
                                                <input type="text"
                                                       class="form-control-lg form-control ps-4 rounded-start-0"
                                                       placeholder="Destination">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-11 ms-2 d-flex mb-lg-0 mb-4">
                                            <label class="position-relative  w-100">
                                                <input type="text" class=" form-control-lg form-control rounded-start-0"
                                                       placeholder="Date of departure">
                                            </label>
                                        </div>
                                        <div class="col-lg-1 col-11 ms-2">
                                <span class="d-grid">
                                    <button class="btn btn-primary btn-lg text-white">Search</button>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="page==='train'">
                                    <div class="input-group d-flex justify-content-center">
                                        <div class="col-lg-4 col-11 input-group-custom d-flex ms-2">
                                            <div class="col-5 mb-lg-0 mb-4 ms-lg-0">
                                                <input type="text" class=" form-control-lg form-control rounded-end-0"
                                                       placeholder="Origin">
                                            </div>
                                            <span
                                                class="input-group-text pointer-cursor col-2 rounded-0 d-flex justify-content-center"
                                                style="height: 3rem">
                                <svg viewBox="0 0 24 24" width="2rem" fill="currentColor"><path
                                        d="m16.96 12.157.07.063 3.75 3.75a.757.757 0 0 1 .06.067l-.06-.067a.748.748 0 0 1 .22.53v.025a.728.728 0 0 1-.003.039L21 16.5a.747.747 0 0 1-.147.446l-.01.014-.008.01-.055.06-3.75 3.75a.75.75 0 0 1-1.123-.99l.063-.07 2.469-2.47H8.25a.75.75 0 0 1-.087-1.495l.087-.005h10.189l-2.47-2.47a.75.75 0 0 1-.062-.99l.063-.07a.75.75 0 0 1 .99-.063ZM8.03 3.22a.75.75 0 0 1 .063.99l-.063.07-2.47 2.47h10.19a.75.75 0 0 1 .088 1.495l-.088.005H5.56l2.47 2.47a.75.75 0 0 1 .063.99l-.063.07a.75.75 0 0 1-.99.063l-.07-.063-3.75-3.75-.055-.06a.644.644 0 0 1-.005-.007l.06.067A.756.756 0 0 1 3 7.5v-.014a.47.47 0 0 1 .003-.053L3 7.5a.756.756 0 0 1 .22-.53l3.75-3.75a.75.75 0 0 1 1.06 0Z"></path></svg>
                            </span>
                                            <div class="col-5">
                                                <input type="text"
                                                       class="form-control-lg form-control ps-4 rounded-start-0"
                                                       placeholder="Destination">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-11 ms-2 d-flex mb-lg-0 mb-4">
                                            <label class="w-50">
                                                <input type="text" class=" form-control-lg form-control rounded-end-0"
                                                       placeholder="Departure date">
                                            </label>
                                            <label class="position-relative coming-input-label-disable w-50">
                                                <input type="text" class=" form-control-lg form-control rounded-start-0"
                                                       placeholder="Return date" disabled>
                                            </label>
                                        </div>
                                        <div class="col-lg-2 col-11 ms-2 mb-lg-0 mb-4">
                                            <input type="text" class=" form-control-lg form-control"
                                                   value="1 passenger">w
                                        </div>
                                        <div class="col-lg-1 col-11 ms-2">
                                <span class="d-grid">
                                    <button class="btn btn-primary btn-lg text-white">Search</button>
                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 10rem; width: 100%;">
            <path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z"
                  style="stroke: none;fill: #f8f9fa;">
            </path>
        </svg>
        <section class="w-100 bg-light">
            <div class="container">
                <h2 class="w-100">fast booking</h2>
                <div class="row mt-5">
                    <div class="col-xl-4 col-lg-6 ">
                        <div class="card mb-4 fast-booking-card-hover bottom-0 fast-booking-card-leave rounded-4">
                            <div class="card-body">
                                <div class="w-100 text-center" style="height: 8rem">
                                    <div class="row w-100">
                                        <div class="col">
                                            <h5>Tehran</h5>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-airplane text-primary" style="transform:rotate(-90deg);"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h5>Mashhad</h5>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-4">
                                        <div class="col">
                                            <h6 class="text-muted">Price</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">100$</h6>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-3">
                                        <div class="col">
                                            <h6 class="text-muted">Flight date</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">24 March</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 ">
                        <div class="card mb-4 fast-booking-card-hover bottom-0 fast-booking-card-leave rounded-4">
                            <div class="card-body">
                                <div class="w-100 text-center" style="height: 8rem">
                                    <div class="row w-100">
                                        <div class="col">
                                            <h5>Tehran</h5>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-airplane text-primary" style="transform:rotate(-90deg);"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h5>Mashhad</h5>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-4">
                                        <div class="col">
                                            <h6 class="text-muted">Price</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">100$</h6>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-3">
                                        <div class="col">
                                            <h6 class="text-muted">Flight date</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">24 March</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 ">
                        <div class="card mb-4 fast-booking-card-hover bottom-0 fast-booking-card-leave rounded-4">
                            <div class="card-body">
                                <div class="w-100 text-center" style="height: 8rem">
                                    <div class="row w-100">
                                        <div class="col">
                                            <h5>Tehran</h5>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-airplane text-primary" style="transform:rotate(-90deg);"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h5>Mashhad</h5>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-4">
                                        <div class="col">
                                            <h6 class="text-muted">Price</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">100$</h6>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-3">
                                        <div class="col">
                                            <h6 class="text-muted">Flight date</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">24 March</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 ">
                        <div class="card mb-4 fast-booking-card-hover bottom-0 fast-booking-card-leave rounded-4">
                            <div class="card-body">
                                <div class="w-100 text-center" style="height: 8rem">
                                    <div class="row w-100">
                                        <div class="col">
                                            <h5>Tehran</h5>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-airplane text-primary" style="transform:rotate(-90deg);"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h5>Mashhad</h5>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-4">
                                        <div class="col">
                                            <h6 class="text-muted">Price</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">100$</h6>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-3">
                                        <div class="col">
                                            <h6 class="text-muted">Flight date</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">24 March</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 ">
                        <div class="card mb-4 fast-booking-card-hover bottom-0 fast-booking-card-leave rounded-4">
                            <div class="card-body">
                                <div class="w-100 text-center" style="height: 8rem">
                                    <div class="row w-100">
                                        <div class="col">
                                            <h5>Tehran</h5>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-airplane text-primary" style="transform:rotate(-90deg);"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h5>Mashhad</h5>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-4">
                                        <div class="col">
                                            <h6 class="text-muted">Price</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">100$</h6>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-3">
                                        <div class="col">
                                            <h6 class="text-muted">Flight date</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">24 March</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 ">
                        <div class="card mb-4 fast-booking-card-hover bottom-0 fast-booking-card-leave rounded-4">
                            <div class="card-body">
                                <div class="w-100 text-center" style="height: 8rem">
                                    <div class="row w-100">
                                        <div class="col">
                                            <h5>Tehran</h5>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-airplane text-primary" style="transform:rotate(-90deg);"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h5>Mashhad</h5>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-4">
                                        <div class="col">
                                            <h6 class="text-muted">Price</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">100$</h6>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-3">
                                        <div class="col">
                                            <h6 class="text-muted">Flight date</h6>
                                        </div>
                                        <div class="col d-flex justify-content-center pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right text-primary" style="" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">24 March</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 10rem; width: 100%;">
            <path d="M0.00,49.99 C150.00,150.00 271.49,-49.99 500.00,49.99 L500.00,0.00 L0.00,0.00 Z"
                  style="stroke: none; fill: #f8f9fa;">
            </path>
        </svg>
        <section class="mb-2">
            <div class="container">
                <div class="mb-5">
                    <h2 class="text-center text-md-start">the Title</h2>
                    <p class="text-muted mt-4 text-justify">Ipsum's outline or Lorem Ipsum is an experimental and
                        nonsensical writing in the printing, page layout and graphic design industries. The graphic
                        designer uses this text as an element of the composition to fill the page and provide the
                        initial appearance and overall shape of the ordered design, to graphically indicate the type and
                        size of the font and the appearance of the text.
                        Ipsum's outline or Lorem Ipsum is an experimental and nonsensical writing in the printing, page
                        layout and graphic design industries. The graphic designer uses this text as an element of the
                        composition to fill the page and provide the initial appearance and overall shape of the ordered
                        design, to graphically indicate the type and size of the font and the appearance of the text.
                    </p>
                </div>
                <div class="mb-5">
                    <h2 class="text-center text-md-start">the Title</h2>
                    <p class="text-muted mt-4 text-justify">Ipsum's outline or Lorem Ipsum is an experimental and
                        nonsensical writing in the printing, page layout and graphic design industries. The graphic
                        designer uses this text as an element of the composition to fill the page and provide the
                        initial appearance and overall shape of the ordered design, to graphically indicate the type and
                        size of the font and the appearance of the text.
                        Ipsum's outline or Lorem Ipsum is an experimental and nonsensical writing in the printing, page
                        layout and graphic design industries. The graphic designer uses this text as an element of the
                        composition to fill the page and provide the initial appearance and overall shape of the ordered
                        design, to graphically indicate the type and size of the font and the appearance of the text.
                    </p>
                </div>
                <div class="mb-5">
                    <h2 class="text-center text-md-start">the Title</h2>
                    <p class="text-muted mt-4 text-justify">Ipsum's outline or Lorem Ipsum is an experimental and
                        nonsensical writing in the printing, page layout and graphic design industries. The graphic
                        designer uses this text as an element of the composition to fill the page and provide the
                        initial appearance and overall shape of the ordered design, to graphically indicate the type and
                        size of the font and the appearance of the text.
                        Ipsum's outline or Lorem Ipsum is an experimental and nonsensical writing in the printing, page
                        layout and graphic design industries. The graphic designer uses this text as an element of the
                        composition to fill the page and provide the initial appearance and overall shape of the ordered
                        design, to graphically indicate the type and size of the font and the appearance of the text.
                    </p>
                </div>
                <div class="mb-5">
                    <h2 class="text-center text-md-start">the Title</h2>
                    <p class="text-muted mt-4 text-justify">Ipsum's outline or Lorem Ipsum is an experimental and
                        nonsensical writing in the printing, page layout and graphic design industries. The graphic
                        designer uses this text as an element of the composition to fill the page and provide the
                        initial appearance and overall shape of the ordered design, to graphically indicate the type and
                        size of the font and the appearance of the text.
                        Ipsum's outline or Lorem Ipsum is an experimental and nonsensical writing in the printing, page
                        layout and graphic design industries. The graphic designer uses this text as an element of the
                        composition to fill the page and provide the initial appearance and overall shape of the ordered
                        design, to graphically indicate the type and size of the font and the appearance of the text.
                    </p>
                </div>
            </div>
        </section>
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 10rem; width: 100%;">
            <path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z"
                  style="stroke: none;fill: #f8f9fa;">
            </path>
        </svg>
        <section class="w-100" style="background: #f8f9fa">
            <div class="container">
                <div class="accordion pb-5" id="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionItemOne">
                                <div class="me-4">
                                    <svg viewBox="0 0 24 24" width="2rem" height="2rem" fill="#17A2B8"
                                         class="bg-primary-subtle rounded-circle">
                                        <path
                                            d="M14.442 16.905c0-1.427-.177-2.564-.531-3.411-.322-.77-.931-1.612-1.827-2.525l-.734-.726c-.787-.786-1.298-1.361-1.533-1.726a3.775 3.775 0 0 1-.646-2.126c0-1.005.249-1.776.747-2.312.498-.536 1.23-.804 2.197-.804.93 0 1.676.26 2.241.782.565.522.847 1.233.847 2.133h3.921c-.028-1.905-.68-3.413-1.953-4.524C15.898.556 14.212 0 12.115 0 9.951 0 8.266.548 7.06 1.645 5.853 2.74 5.25 4.275 5.25 6.248c0 1.752.814 3.476 2.442 5.17l1.996 1.954c.709.813 1.072 1.991 1.092 3.533h3.662Zm.273 5.027c0-.642-.199-1.159-.596-1.551-.397-.393-.936-.59-1.616-.59-.69 0-1.233.204-1.63.611-.397.407-.596.917-.596 1.53 0 .584.194 1.075.582 1.472.387.397.936.596 1.644.596.709 0 1.255-.199 1.637-.596.384-.397.575-.888.575-1.472Z"></path>
                                    </svg>
                                </div>
                                <div class="">
                                    <b>When we make a ticket reservation from the plane ticket purchase site, is it
                                        possible to choose the seat we want?</b>
                                </div>
                            </button>
                            <div class="accordion-collapse collapse" data-bs-parent="#accordion" id="accordionItemOne">
                                <div class="accordion-body">
                                    Ipsum's outline or Lorem Ipsum is an experimental and nonsensical writing in the
                                    printing, page layout and graphic design industries. The graphic designer uses this
                                    text as an element of the composition to fill the page and provide the initial
                                    appearance and overall shape of the ordered design, to graphically indicate the type
                                    and size of the font and the appearance of the text. Ipsum's outline or Lorem Ipsum
                                    is an experimental and nonsensical writing in the printing, page layout and graphic
                                    design industries. The graphic designer uses this text as an element of the
                                    composition to fill the page and provide the initial appearance and overall shape of
                                    the ordered design, to graphically indicate the type and size of the font and the
                                    appearance of the text.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionItemTwo">
                                <div class="me-4">
                                    <svg viewBox="0 0 24 24" width="2rem" height="2rem" fill="#17A2B8"
                                         class="bg-primary-subtle rounded-circle">
                                        <path
                                            d="M14.442 16.905c0-1.427-.177-2.564-.531-3.411-.322-.77-.931-1.612-1.827-2.525l-.734-.726c-.787-.786-1.298-1.361-1.533-1.726a3.775 3.775 0 0 1-.646-2.126c0-1.005.249-1.776.747-2.312.498-.536 1.23-.804 2.197-.804.93 0 1.676.26 2.241.782.565.522.847 1.233.847 2.133h3.921c-.028-1.905-.68-3.413-1.953-4.524C15.898.556 14.212 0 12.115 0 9.951 0 8.266.548 7.06 1.645 5.853 2.74 5.25 4.275 5.25 6.248c0 1.752.814 3.476 2.442 5.17l1.996 1.954c.709.813 1.072 1.991 1.092 3.533h3.662Zm.273 5.027c0-.642-.199-1.159-.596-1.551-.397-.393-.936-.59-1.616-.59-.69 0-1.233.204-1.63.611-.397.407-.596.917-.596 1.53 0 .584.194 1.075.582 1.472.387.397.936.596 1.644.596.709 0 1.255-.199 1.637-.596.384-.397.575-.888.575-1.472Z"></path>
                                    </svg>
                                </div>
                                <div class="">
                                    <b>When we make a ticket reservation from the plane ticket purchase site, is it
                                        possible to choose the seat we want?</b>
                                </div>
                            </button>
                            <div class="accordion-collapse collapse" data-bs-parent="#accordion" id="accordionItemTwo">
                                <div class="accordion-body">
                                    Ipsum's outline or Lorem Ipsum is an experimental and nonsensical writing in the
                                    printing, page layout and graphic design industries. The graphic designer uses this
                                    text as an element of the composition to fill the page and provide the initial
                                    appearance and overall shape of the ordered design, to graphically indicate the type
                                    and size of the font and the appearance of the text. Ipsum's outline or Lorem Ipsum
                                    is an experimental and nonsensical writing in the printing, page layout and graphic
                                    design industries. The graphic designer uses this text as an element of the
                                    composition to fill the page and provide the initial appearance and overall shape of
                                    the ordered design, to graphically indicate the type and size of the font and the
                                    appearance of the text.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionItemThree">
                                <div class="me-4">
                                    <svg viewBox="0 0 24 24" width="2rem" height="2rem" fill="#17A2B8"
                                         class="bg-primary-subtle rounded-circle">
                                        <path
                                            d="M14.442 16.905c0-1.427-.177-2.564-.531-3.411-.322-.77-.931-1.612-1.827-2.525l-.734-.726c-.787-.786-1.298-1.361-1.533-1.726a3.775 3.775 0 0 1-.646-2.126c0-1.005.249-1.776.747-2.312.498-.536 1.23-.804 2.197-.804.93 0 1.676.26 2.241.782.565.522.847 1.233.847 2.133h3.921c-.028-1.905-.68-3.413-1.953-4.524C15.898.556 14.212 0 12.115 0 9.951 0 8.266.548 7.06 1.645 5.853 2.74 5.25 4.275 5.25 6.248c0 1.752.814 3.476 2.442 5.17l1.996 1.954c.709.813 1.072 1.991 1.092 3.533h3.662Zm.273 5.027c0-.642-.199-1.159-.596-1.551-.397-.393-.936-.59-1.616-.59-.69 0-1.233.204-1.63.611-.397.407-.596.917-.596 1.53 0 .584.194 1.075.582 1.472.387.397.936.596 1.644.596.709 0 1.255-.199 1.637-.596.384-.397.575-.888.575-1.472Z"></path>
                                    </svg>
                                </div>
                                <div class="">
                                    <b>When we make a ticket reservation from the plane ticket purchase site, is it
                                        possible to choose the seat we want?</b>
                                </div>
                            </button>
                            <div class="accordion-collapse collapse" data-bs-parent="#accordion"
                                 id="accordionItemThree">
                                <div class="accordion-body">
                                    Ipsum's outline or Lorem Ipsum is an experimental and nonsensical writing in the
                                    printing, page layout and graphic design industries. The graphic designer uses this
                                    text as an element of the composition to fill the page and provide the initial
                                    appearance and overall shape of the ordered design, to graphically indicate the type
                                    and size of the font and the appearance of the text. Ipsum's outline or Lorem Ipsum
                                    is an experimental and nonsensical writing in the printing, page layout and graphic
                                    design industries. The graphic designer uses this text as an element of the
                                    composition to fill the page and provide the initial appearance and overall shape of
                                    the ordered design, to graphically indicate the type and size of the font and the
                                    appearance of the text.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionItemFour">
                                <div class="me-4">
                                    <svg viewBox="0 0 24 24" width="2rem" height="2rem" fill="#17A2B8"
                                         class="bg-primary-subtle rounded-circle">
                                        <path
                                            d="M14.442 16.905c0-1.427-.177-2.564-.531-3.411-.322-.77-.931-1.612-1.827-2.525l-.734-.726c-.787-.786-1.298-1.361-1.533-1.726a3.775 3.775 0 0 1-.646-2.126c0-1.005.249-1.776.747-2.312.498-.536 1.23-.804 2.197-.804.93 0 1.676.26 2.241.782.565.522.847 1.233.847 2.133h3.921c-.028-1.905-.68-3.413-1.953-4.524C15.898.556 14.212 0 12.115 0 9.951 0 8.266.548 7.06 1.645 5.853 2.74 5.25 4.275 5.25 6.248c0 1.752.814 3.476 2.442 5.17l1.996 1.954c.709.813 1.072 1.991 1.092 3.533h3.662Zm.273 5.027c0-.642-.199-1.159-.596-1.551-.397-.393-.936-.59-1.616-.59-.69 0-1.233.204-1.63.611-.397.407-.596.917-.596 1.53 0 .584.194 1.075.582 1.472.387.397.936.596 1.644.596.709 0 1.255-.199 1.637-.596.384-.397.575-.888.575-1.472Z"></path>
                                    </svg>
                                </div>
                                <div class="">
                                    <b>When we make a ticket reservation from the plane ticket purchase site, is it
                                        possible to choose the seat we want?</b>
                                </div>
                            </button>
                            <div class="accordion-collapse collapse" data-bs-parent="#accordion" id="accordionItemFour">
                                <div class="accordion-body">
                                    Ipsum's outline or Lorem Ipsum is an experimental and nonsensical writing in the
                                    printing, page layout and graphic design industries. The graphic designer uses this
                                    text as an element of the composition to fill the page and provide the initial
                                    appearance and overall shape of the ordered design, to graphically indicate the type
                                    and size of the font and the appearance of the text. Ipsum's outline or Lorem Ipsum
                                    is an experimental and nonsensical writing in the printing, page layout and graphic
                                    design industries. The graphic designer uses this text as an element of the
                                    composition to fill the page and provide the initial appearance and overall shape of
                                    the ordered design, to graphically indicate the type and size of the font and the
                                    appearance of the text.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
