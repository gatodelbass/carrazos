<template>
  <body
    class="text-teal-200 m-0 bg-cover bg-fixed text-jost"
    style="background-image: url('images/blue.jpg')"
  >
    <div class="h-full">
      <!--Nav-->
      <div class="w-full container mx-auto">
        <div class="w-full flex items-center justify-between pt-2">
          <div class="w-1/2">
            <span
              class="flex items-center text-orange-400 no-underline hover:no-underline font-semibold text-3xl lg:text-4xl mx-2"
              href="#"
            >
              <img
                class="h-12 w-12 object-cover object-center mx-2 rounded-full"
                :src="'/images/logo.png'"
                alt=""
              />

              Carrazos
            </span>
          </div>
        </div>
      </div>

      <!--Main-->
      <div
        class="container mx-auto flex flex-wrap flex-col md:flex-row items-center"
      >
        <!--Left Col-->
        <div class="p-4 flex flex-col w-full xl:w-2/5 justify-center">
          <h1
            class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold text-center md:text-left"
          >
            Bienvenido a <span class="text-cyan-500"> Carrazos</span>, en donde
            encontrarás el carro de tus sueños al mejor precio
          </h1>
          <p
            class="leading-normal text-base md:text-2xl my-8 mx-4 text-center text-sky-300 md:text-left"
          >
            Estamos de aniversario! Registrate y participa por fabulosos
            premios!
          </p>
        </div>

        <!--Right Col-->
        <div
          class="p-0 md:p-4 flex flex-col w-full xl:w-3/5 justify-center bg-amber-50 rounded border-4 border-dashed border-amber-300"
        >
          <div class="flex flex-wrap text-gray-700">
            <div class="w-full text-center mb-2">
              <p class="text-gray-500">
                <span class="text-red-500">*</span>Campos obligatorios
              </p>
            </div>

            <div class="w-full md:w-1/3 mb-4 px-2">
              <jet-label class="text-teal-200" for="name"
                ><span class="text-red-500 mx-1">*</span>Nombre:
              </jet-label>
              <jet-input
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
              />
              <jet-input-error
                v-if="form.errors.name"
                :message="form.errors.name"
                class="mt-2"
              />
            </div>

            <div class="w-full md:w-1/3 mb-4 px-2">
              <jet-label class="text-teal-200" for="lastname"
                ><span class="text-red-500 mx-1">*</span>Apellido:
              </jet-label>
              <jet-input
                type="text"
                class="mt-1 block w-full"
                v-model="form.lastname"
              />
              <jet-input-error :message="form.errors.lastname" class="mt-2" />
            </div>

            <div class="w-full md:w-1/3 mb-4 px-2">
              <jet-label class="text-teal-200" for="document"
                ><span class="text-red-500 mx-1">*</span>Cédula / documento:
              </jet-label>
              <jet-input
                type="text"
                class="mt-1 block w-full"
                v-model="form.document"
              />
              <jet-input-error :message="form.errors.document" class="mt-2" />
            </div>

            <div class="w-full md:w-1/3 mb-4 px-2">
              <jet-label class="text-teal-200" for="phone"
                ><span class="text-red-500 mx-1">*</span>Celular:
              </jet-label>
              <jet-input
                type="text"
                class="mt-1 block w-full"
                v-model="form.phone"
              />
              <jet-input-error :message="form.errors.phone" class="mt-2" />
            </div>

            <div class="w-full md:w-1/3 mb-4 px-2">
              <jet-label for="office"
                ><span class="text-red-500 mx-1">*</span>Departamento:
              </jet-label>

              <select
                @change="selectDepartmentByList($event)"
                class="text py-2 px-3 rounded-sm border-1 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent w-full"
              >
                <option
                  v-for="dept in departments"
                  :key="dept.id"
                  v-bind:value="dept.id"
                >
                  {{ dept.name }}
                </option>
              </select>
            </div>

            <div class="w-full md:w-1/3 mb-4 px-2">
              <jet-label for="name"
                ><span class="text-red-500 mx-1">*</span>Ciudad / municipio:
              </jet-label>
              <select
                v-model="form.city_municipality_id"
                class="text py-2 px-3 rounded-sm border-1 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent w-full"
              >
                <option
                  v-for="muni in state.municipalities"
                  :key="muni.id"
                  v-bind:value="muni.id"
                >
                  {{ muni.name }}
                </option>
              </select>
              <jet-input-error
                :message="form.errors.city_municipality_id"
                class="mt-2"
              />
            </div>

            <div class="w-full md:w-1/3 mb-4 px-2">
              <jet-label for="email">Email:</jet-label>
              <jet-input
                id="email"
                type="text"
                class="mt-1 block w-full"
                v-model="form.email"
              />
              <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <div class="w-full md:w-1/3 mb-4 px-2">
              <jet-label for="email">Acepto términos y condiciones:</jet-label>

              <input
                type="checkbox"
                class="rounded-sm form-checkbox h-6 w-6 text-teal-500 mt-3"
                v-model="form.authorize"
              />
            </div>
          </div>

          <div
            v-if="form.authorize == true"
            class="flex items-center justify-center my-4 text-white text-lg"
          >
            <button
              @click="save()"
              class="w-auto bg-lightBlue-500 hover:bg-lightBlue-600 rounded-sm shadow-xl px-4 py-2 text-josefin"
            >
              Registrarme
            </button>
          </div>

          <div
            v-else
            class="flex items-center justify-center my-4 text-gray-700 text-lg"
          >
            <p>Debes aceptar los términos y condiciones para registrarte!</p>
          </div>
        </div>

        <div
          v-if="state.clientQuantity >= 5"
          class="w-full justify-center p-10 m-10 rounded"
        >
          <h1 class="text-2xl text-pink-300 w-full">
            Participa en nuestro sorteo! (hay
            {{ state.clientQuantity }} usuarios registrados)
          </h1>

          <div class="w-full m-1">
            <button
              class="bg-teal-300 m-2 px-4 py-2 border-1 border-teal-400 shadow text-jost text-gray-700"
              @click="getRandomClient()"
            >
              <span class="w-full"
                >has click para obtener un cliente aleatorio</span
              >
            </button>
          </div>
          <div class="w-full m-1">
            <a
              class="bg-teal-300 m-2 px-4 py-2 border-1 border-teal-400 shadow text-jost text-gray-700"
              href="getClientList"
              >descarga el listado de clientes</a
            >
          </div>

          <div v-if="state.randomClient != null" class="m-1">
            <div
              class="m-2 border-1 border-gray-500 text-jost text-xs md:text-sm w-56 md:w-72 text-gray-700 bg-gradient-to-tr from-amber-100 via-amber-200 to-amber-300 rounded-xl shadow-md"
            >
              <div class="w-full py-5">
                <div class="flex justify-center my-4 text-4xl">
                  Felicitaciones!
                </div>

                <div class="flex justify-center">
                  <img
                    class="w-24 md:w-32 inline-block rounded-full border-amber-200 border-3"
                    src="https://media.istockphoto.com/vectors/user-icon-flat-isolated-on-white-background-user-symbol-vector-vector-id1300845620?k=20&m=1300845620&s=612x612&w=0&h=f4XTZDAv7NPuZbG0habSpU0sNgECM0X7nbKzTUta3n8="
                  />
                </div>

                <div class="flex flex-col text-center mt-3 mb-4">
                  <span class="text-2xl"
                    >{{ state.randomClient.name }}
                    {{ state.randomClient.lastname }}</span
                  >
                </div>

                <div
                  class="flex flex-wrap justify-center w-full bg-amber-200 px-2 text-gray-700 py-1"
                >
                  <div class="w-2/3 text-left">Cédula</div>
                  <div class="w-1/3 text-right">
                    {{ state.randomClient.document }}
                  </div>
                </div>
                <div
                  class="flex flex-wrap justify-center w-full bg-amber-200 px-2 text-gray-700 py-1"
                >
                  <div class="w-2/3 text-left">Celular</div>
                  <div class="w-1/3 text-right">
                    {{ state.randomClient.phone }}
                  </div>
                </div>
                <div
                  class="flex flex-wrap justify-center w-full bg-amber-200 px-2 text-gray-700 py-1"
                >
                  <div class="w-2/3 text-left">Ciudad</div>
                  <div class="w-1/3 text-right">
                    {{ state.randomClient.city_municipality.name }}
                  </div>
                </div>
                <div
                  class="flex flex-wrap justify-center w-full bg-amber-200 px-2 text-gray-700 py-1"
                >
                  <div class="w-2/3 text-left">Depto</div>
                  <div class="w-1/3 text-right">
                    {{
                      state.randomClient.city_municipality.city_department.name
                    }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="w-full justify-center flex flex-wrap p-5 lg:mt-5"></div>

        <!--Footer-->
        <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
          <p class="text-gray-400">
            Contacto
            <span class="text-violet-400"> davemmgarcia@gmail.com</span>
          </p>
        </div>
      </div>
    </div>
  </body>
</template>

<script>
import { onMounted, reactive } from "vue";

import { useForm } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetSelect from "@/Jetstream/Select";
import Swal from "sweetalert2";
import { Inertia } from "@inertiajs/inertia";

export default {
  name: "Welcome",

  components: {
    JetInput,
    JetInputError,
    JetLabel,
    JetSelect,
  },

  props: {
    departments: {
      type: Object,
      default: {},
    },
    clientQuantity: {
      type: Number,
      default: 0,
    },

    errors: Object,
  },

  setup(props, { emit }) {
    const state = reactive({
      clientQuantity: props.clientQuantity,
      municipalities: {},
      randomClient: null,
    });

    onMounted(() => {});

    const form = useForm({
      name: null,
      lastname: null,
      document: null,
      phone: null,
      email: null,
      city_municipality_id: null,
      authorize: false,
    });

    async function save() {
      form.processing = true;

      await axios
        .post(route("createClient"), form)
        .then(function (response) {
          form.clearErrors();
          form.reset();

          state.clientQuantity = response.data.clientQuantity;

          Swal.fire({
            toast: true,
            title:
              '<p class="text-xl text-blueGray-300">Cliente registrado!</p>',
            showClass: { popup: "" },
            position: "top-end",
            showConfirmButton: false,
            icon: "success",
            background: "#334155",
            timer: 1500,
          });
        })
        .catch(function (error) {
          form.errors = error.response.data.errors;
        });
    }

    function selectDepartmentByList(event) {
      selectDepartment(event.target.value);
    }

    function selectDepartment(id) {
      axios
        .get(route("getMunicipalities", id))
        .then((response) => {
          state.municipalities = response.data.municipalities;
        })
        .catch(() => {
          alert("error");
        });
    }

    async function getRandomClient() {
      await axios
        .get(route("getRandomClient"))
        .then(function (response) {
          state.randomClient = {};

          state.randomClient = response.data.randomClient;

          Swal.fire({
            toast: true,
            title: '<p class="text-xl text-blueGray-300">Hecho!</p>',
            showClass: { popup: "" },
            position: "top-end",
            showConfirmButton: false,
            icon: "success",
            background: "#334155",
            timer: 1500,
          });
        })
        .catch(function (error) {});
    }

    return {
      save,
      form,
      state,
      selectDepartment,
      selectDepartmentByList,
      getRandomClient,
    };
  },
};
</script>

<style>
@font-face {
  font-family: "Jost";
  src: local("Jost"), url(/fonts/Jost-VariableFont_wght.ttf) format("truetype");
}

body {
  font-family: "Jost";
}

.text-jost {
  font-family: "Jost";
}
</style>
