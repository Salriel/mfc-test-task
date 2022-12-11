import axios from "axios";
import config from "tailwindcss/defaultConfig";


const axiosClient = axios.create({
   baseURL: 'http://localhost:8000/api'
});

axiosClient.interceptors.request.use(config => {
    return config;
});

export default axiosClient;
