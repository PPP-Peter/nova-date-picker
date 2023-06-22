<template>
    <Card class="flex flex-col items-right justify-center p-3 max-height-30 min-height-20">
        <div class="container">


            <div class="container2 ml-3">
                <h1 class="text-lg  text-gray-500 font-light" v-if="!userDisable">
                    <strong class="font-bold p-2">{{ __('Name') }}:</strong>{{ user.name }}
                    <strong class="font-bold p-2">{{ __('Email') }}:</strong>{{ user.email }}
                </h1>
                <div v-if="userDisable" class="prazdne" style="height: 30px"> </div>
            </div>


            <div class="container3 flex ml-3" style="position: absolute; right:3%;top: 8px;">
                <h1 class="text-right text-xl text-gray-500 font-light pr-4">{{ __('Displayed period') }} </h1>
                <div class="flex relative ml-auto w-[6rem] flex-shrink-0">
                    <select aria-label="Select Ranges" class="w-full block form-control form-select  form-select-bordered"
                            @change="startPicker()"
                    >
                        <option value="7">{{ __('7 Days') }}</option>
                        <option value="30">{{ __('30 Days') }}</option>
                        <option value="60">{{ __('60 Days') }}</option>
                        <option value="90">{{ __('90 Days') }}</option>
                        <option value="365">{{ __('365 Days') }}</option>
                    </select>
                    <svg class="flex-shrink-0 pointer-events-none form-select-arrow" xmlns="http://www.w3.org/2000/svg"  width="10" height="6" viewBox="0 0 10 6">
                        <path class="fill-current"
                              d="M8.292893.292893c.390525-.390524 1.023689-.390524 1.414214 0 .390524.390525.390524 1.023689 0 1.414214l-4 4c-.390525.390524-1.023689.390524-1.414214 0l-4-4c-.390524-.390525-.390524-1.023689 0-1.414214.390525-.390524 1.023689-.390524 1.414214 0L5 3.585786 8.292893.292893z"></path>
                    </svg>
                </div>
                <div class="refreshCharts" @click="startPicker()" :class="{ rotate: startRotate }">
                    <svg fill="#817e7e" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 383.748 383.748" xml:space="preserve" stroke="#817e7e"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M62.772,95.042C90.904,54.899,137.496,30,187.343,30c83.743,0,151.874,68.13,151.874,151.874h30 C369.217,81.588,287.629,0,187.343,0c-35.038,0-69.061,9.989-98.391,28.888C70.368,40.862,54.245,56.032,41.221,73.593 L2.081,34.641v113.365h113.91L62.772,95.042z"></path> <path d="M381.667,235.742h-113.91l53.219,52.965c-28.132,40.142-74.724,65.042-124.571,65.042 c-83.744,0-151.874-68.13-151.874-151.874h-30c0,100.286,81.588,181.874,181.874,181.874c35.038,0,69.062-9.989,98.391-28.888 c18.584-11.975,34.707-27.145,47.731-44.706l39.139,38.952V235.742z"></path> </g> </g></svg>
                </div>
            </div>

        </div>

    </Card>
</template>

<script>
export default {
    props: [
        'card',
    ],

    data() {
        return {
            select: '',
            user: '',
            startRotate: false,
            userDisable: this.card.userDisable || false ,
        }
    },
    methods: {
        startPicker() {
            this.startRotate = true;
            let selectedValue = document.querySelectorAll('.form-control.form-select.form-select-bordered')[0].value
            document.querySelectorAll('.form-control.form-select.form-control-xxs.form-select-bordered').forEach(function (selectElement) {
                selectElement.value = selectedValue;
                selectElement.dispatchEvent(new Event('change'));
            });
            setTimeout(() => {
                this.startRotate = false;
            }, 1000);
        },

        async userData() {
            return await Nova.request().get('/nova-vendor/date-picker/user')
                .then(response => {
                    this.user = response.data
                    return response.data
                })
        },

    },

    mounted() {
        this.userData()
        console.log('user enable')
        console.log(this.card.userDisable)
        console.log(this.userDisable)
    },
}
</script>

<style scoped>
    h1{
        align-self: center;
    }
    .refreshCharts{
        align-self: center !important;
        margin-left: 14px;
        filter: contrast(0.5);
        opacity: 0.7;
    }
    .refreshCharts:hover{
        cursor: pointer;
        filter: contrast(1.1);
        opacity: 1;
    }
    .rotate{
        animation: rotation 1s infinite linear;
    }
    @keyframes rotation {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(359deg);
        }
    }
    Card {
      height:55px !important;
    }
</style>
