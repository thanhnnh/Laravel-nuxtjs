import usersService from '~/services/users'
import friendlyService from '~/services/friendly'
import csrfService from "~/Services/csrf";
import chatService from "~/Services/chat"

export default ({ $axios }, inject) => {
    const allMethods = {
        ...usersService($axios),
        ...friendlyService($axios),
        ...csrfService($axios),
        ...chatService($axios),

        // import another service here
    }
    const methods = Object.keys(allMethods)
    methods.forEach((method) => {
        inject(method, allMethods[method])
    })
}
