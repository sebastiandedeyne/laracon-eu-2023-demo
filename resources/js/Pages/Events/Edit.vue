<template>
    <div class="wrap py-12">
        <form @submit.prevent="submit" @keydown.enter.prevent="submit" class="space-y-6">
            <TextField label="Name" v-model="form.name" />
            <SelectField label="Venue" :options="view.venues" v-model="form.venue_id" />
            <div class="mt-6">
                <label class="block font-bold uppercase text-sm">Tracks & Sessions</label>
                <ul>
                   <li v-for="(track, trackIndex) in form.tracks" :key="trackIndex" class="mt-2 p-4 bg-gray-200">
                       <div class="flex gap-x-4">
                           <TextField label="Name" v-model="track.name" />
                           <button
                               class="ml-2 font-bold mt-5"
                               @click.prevent="form.tracks.splice(trackIndex, 1)"
                           >⨉</button>
                       </div>
                       <ul>
                           <li v-for="(session, sessionIndex) in track.sessions" :key="sessionIndex">
                               <div class="flex gap-x-4 mt-4">
                                   <TextField label="Starts At" v-model="session.starts_at" />
                                   <TextField label="Ends At" v-model="session.ends_at" />
                                   <TextField label="Session Name" v-model="session.name" />
                                   <button
                                       class="ml-2 font-bold mt-5"
                                       @click.prevent="track.sessions.splice(sessionIndex, 1)"
                                   >⨉</button>
                               </div>
                           </li>
                           <li>
                                <button
                                    class="bg-purple-600 text-purple-100 px-2 py-1 mt-4"
                                    @click.prevent="track.sessions.push({ id: null, name: '', starts_at: '', ends_at: '' })"
                                >
                                    Add Session
                                </button>
                            </li>
                       </ul>
                   </li>
                    <li>
                        <button
                            class="bg-purple-600 text-purple-100 px-2 py-1 mt-4"
                            @click.prevent="form.tracks.push({ id: null, name: '', sessions: [] })"
                        >
                            Add Track
                        </button>
                    </li>
                </ul>
            </div>
            <div class="flex">
                <Submit>Save</Submit>
                <a :href="view.event.links.show">View↗</a>
            </div>
            <p v-if="form.recentlySuccessful" class="bg-green-200 text-green-900 fixed bottom-8 right-0 p-4">Saved!</p>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import TextField from "../../Shared/Forms/TextField.vue";
import SelectField from "../../Shared/Forms/SelectField.vue";
import Submit from "../../Shared/Forms/Submit.vue";

const { view } = defineProps({ view: Object })

const form = useForm({
  name: view.event?.name,
  venue_id: view.event?.venue.id,
  tracks: view.event?.tracks || [],
});

function submit() {
    form.submit(view.method, view.action, { preserveScroll: true });
}
</script>
