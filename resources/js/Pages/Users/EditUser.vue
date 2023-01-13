<template>
    <breeze-authenticated-layout>
        <template #header>
            <Heading>Edit User - {{ form.name }}</Heading>
        </template>

        <div v-show="form.hasErrors">
            <div class="text-red-600 font-medium">
                Please make the following corrections:
            </div>
        </div>

        <div v-show="form.wasSuccessful">
            <div class="text-green-600 font-medium">
                Profile Updated.
            </div>
        </div>

        <form @submit.prevent="submit">
            <div>
                <Label for="name" value="Name"></Label>
                <Input type="text" id="name" class="mt-1 block w-1/2" v-model="form.name" required autofocus
                    :error="form.errors.name"></Input>
                <InputError :message="form.errors.name"></InputError>
            </div>
            <div class="mt-4">
                <Label for="email" value="Email"></Label>
                <Input type="email" id="email" class="mt-1 block w-1/2" v-model="form.email"
                    :error="form.errors.email"></Input>
                <InputError :message="form.errors.email"></InputError>
            </div>

            <!-- FOR IMAGE -->
            <div>
                <Label for="image" value="image"></Label>
                <input type="file" class="hidden" ref="photo" @change="updatePhotoPreview" />

                <div class="mt-2" v-show="!photoPreview && user.image">
                    <img :src="currentImage()" class="rounded-full h-20 w-20 object-cover">
                </div>

                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">

                    </span>
                </div>

                <InputError :message="form.errors.image"></InputError>

                <Button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">Select a New Photo</Button>
            </div>

            <!-- submit -->
            <div class="flex items-center justify-end mt-4">
                <ResetButton @click="resetForm">Reset</ResetButton>
                <Button :loading="form.processing">Update</Button>
            </div>
        </form>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import AnchorLink from "@/Components/AnchorLink";
import Label from "@/Components/Label";
import Input from "@/Components/Input";
import InputError from "@/Components/InputError";
import Button from "@/Components/Button";
import ResetButton from "@/Components/ResetButton";
import Heading from "@/Components/Heading";
import Select from "@/Components/Select";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        AnchorLink,
        Label,
        Input,
        Button,
        ResetButton,
        InputError,
        Heading,
        Select,
    },
    setup(props) {
        const form = useForm({
            _method: 'PUT',
            name: props.user.name,
            email: props.user.email,
            image: props.user.image
        });

        return { form };
    },
    props: {
        user: Object,
    },
    data() {
        return {
            photoPreview: null,
        }
    },
    methods: {
        submit() {
            if (this.$refs.photo) {
                this.form.image = this.$refs.photo.files[0];
            }
            this.form.post(route("update-profile", this.user.id));
        },
        resetForm() {
            this.form.clearErrors();
            this.form.reset();
        },
        currentImage() {
            return '/storage/' + this.user.image;
        },
        selectNewPhoto() {
            this.$refs.photo.click();
        },
        updatePhotoPreview() {
            const reader = new FileReader();
            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };
            reader.readAsDataURL(this.$refs.photo.files[0]);
        }
    },
};
</script>
