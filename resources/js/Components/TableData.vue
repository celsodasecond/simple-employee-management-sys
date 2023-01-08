<template>
    <td class="border px-4 py-2" :class="{ 'cursor-pointer': sortHeader }">
        <slot />
        <span v-if="sortHeader" :class="{ 'float-right': sortHeader }">
            <span v-if="sortby == field">
                <span v-if="sort == 'asc'">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <span v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </span>
        </span>
    </td>
</template>

<script>
export default {
    props: {
        sortHeader: {
            type: Boolean,
            default: false
        },
        field: {
            type: String,
            default: "",
        },
        sortby: {
            type: String,
            default: "",
        },
        sort: {
            type: String,
            default: "",
        }
    }
}
</script>