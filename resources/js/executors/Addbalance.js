class Addbalance extends Executor {

    __invoke (modal,user_id) {

        this.target.setAttribute('disables','disabled');

        jax['add_balance'].balance(user_id,modal,$('#input_balance').val()).finally(() => this.target.removeAttribute('disabled'));

    }

    static __name () {

        return "addbalance";
    }
}

module.exports = Addbalance;
