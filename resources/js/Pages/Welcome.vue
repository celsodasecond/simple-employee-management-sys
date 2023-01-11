<template>
    <div v-if="canLogin" class="bg-white">
        <header>
            <Popover class="relative bg-white">
                <div
                    class="flex justify-between items-center max-w-7xl mx-auto px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="#">
                            <span class="sr-only">Workflow</span>
                            <img class="h-8 w-auto sm:h-10"
                                src="https://tailwindui.com/img/logos/workflow-mark-purple-600-to-indigo-600.svg"
                                alt="" />
                        </a>
                    </div>


                    <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0 ">
                        <inertia-link :href="route('login')"
                            class="animate__animated animate__bounce whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900"
                            :class="{hidden: $page.props.auth.user}">
                            Sign in
                        </inertia-link>
                        <inertia-link v-if="canRegister" :href="route('register')"
                            class="ml-8 whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700"
                            :class="{hidden: $page.props.auth.user}">
                            Sign up </inertia-link>
                    </div>
                </div>
            </Popover>
        </header>
        <!-- Hero section -->
        <div class="static">
            <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100" />
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
                    <div class="absolute inset-0">
                        <img class="h-full w-full object-cover"
                            src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2830&q=80&sat=-100"
                            alt="People working on laptops" />
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-800 to-indigo-700 mix-blend-multiply" />
                    </div>
                    <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                        <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                            <span class="animate__animated animate__fadeInLeft  block text-white">Take control of your</span>
                            <span class="animate__animated animate__fadeInRight  block text-indigo-200">Organization</span>
                        </h1>
                        <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">Streamline your workforce with our employee management system - boosting productivity and communication in one
                        easy-to-use platform.</p>
                        <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                            <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-1 sm:gap-5">
                                <inertia-link v-if="$page.props.auth.user" href="/dashboard"
                                    class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-indigo-50 sm:px-8">
                                    Dashboard </inertia-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import { defineComponent, h } from 'vue'
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import {
    AnnotationIcon,
    ChatAlt2Icon,
    ChatAltIcon,
    DocumentReportIcon,
    HeartIcon,
    InboxIcon,
    MenuIcon,
    PencilAltIcon,
    QuestionMarkCircleIcon,
    ReplyIcon,
    SparklesIcon,
    TrashIcon,
    UsersIcon,
    XIcon,
} from '@heroicons/vue/outline'
import { ChevronDownIcon } from '@heroicons/vue/solid'
import 'animate.css';
export default {
    props: {
        auth: Object,
        canLogin: Boolean,
        canRegister: Boolean,
        errors: Object,
        laravelVersion: String,
        phpVersion: String,
    },
    
}
</script>
