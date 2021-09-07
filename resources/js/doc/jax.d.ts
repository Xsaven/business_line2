declare interface JaxModelInterface {
    commentary: JaxModelCommentaryInterface;
    guest: JaxModelGuestInterface;
    questions: JaxModelQuestionsInterface;
    table: JaxModelTableInterface;
    user: JaxModelUserInterface;
    lte_admin: JaxModelLteAdminInterface;
    lte_root_preferences: JaxModelLteRootPreferencesInterface;
    lte_scaffolding: JaxModelLteScaffoldingInterface|Promise<JaxModelLteScaffoldingInterface>|Function;
    add_balance: JaxModelAddBalanceInterface;
    commentaries_control: JaxModelCommentariesControlInterface;
    questions_control: JaxModelQuestionsControlInterface;
    user_control: JaxModelUserControlInterface;
    params (...withs: any[]): JaxModelInterface
    param (name: string, value: any): JaxModelInterface
    blob (name: string, value: any): JaxModelInterface
    blobs (fields: any): JaxModelInterface
    state (from_to: string, to?: string): JaxModelInterface
    path (path: string, ...params: any): JaxModelInterface
}
declare interface JaxModelUserControlInterface {
    reset_password(...params: any[]): Promise<JaxModelUserControlInterface>;
        auth(...params: any[]): Promise<JaxModelUserControlInterface>;
        logout(...params: any[]): Promise<JaxModelUserControlInterface>;
}
declare interface JaxModelQuestionsControlInterface {
    list_for_approve(...params: any[]): Promise<JaxModelQuestionsControlInterface>;
        approve(...params: any[]): Promise<JaxModelQuestionsControlInterface>;
        drop(...params: any[]): Promise<JaxModelQuestionsControlInterface>;
}
declare interface JaxModelCommentariesControlInterface {
    list_for_approve(...params: any[]): Promise<JaxModelCommentariesControlInterface>;
        approve(...params: any[]): Promise<JaxModelCommentariesControlInterface>;
        drop(...params: any[]): Promise<JaxModelCommentariesControlInterface>;
        switch_moderation(...params: any[]): Promise<JaxModelCommentariesControlInterface>;
        switch_commentary(...params: any[]): Promise<JaxModelCommentariesControlInterface>;
}
declare interface JaxModelAddBalanceInterface {
    balance(...params: any[]): Promise<JaxModelAddBalanceInterface>;
}
declare interface JaxModelLteScaffoldingInterface {
}
declare interface JaxModelLteRootPreferencesInterface {
    update_functions(...params: any[]): Promise<JaxModelLteRootPreferencesInterface>;
        drop_function(...params: any[]): Promise<JaxModelLteRootPreferencesInterface>;
}
declare interface JaxModelLteAdminInterface {
    nestable_save(...params: any[]): Promise<JaxModelLteAdminInterface>;
        custom_save(...params: any[]): Promise<JaxModelLteAdminInterface>;
        mass_delete(...params: any[]): Promise<JaxModelLteAdminInterface>;
        load_modal(...params: any[]): Promise<JaxModelLteAdminInterface>;
}
declare interface JaxModelUserInterface {
    update_user_data(...params: any[]): Promise<JaxModelUserInterface>;
        upload_avatar(...params: any[]): Promise<JaxModelUserInterface>;
        subscribe(...params: any[]): Promise<JaxModelUserInterface>;
        update(...params: any[]): Promise<JaxModelUserInterface>;
        change_name(...params: any[]): Promise<JaxModelUserInterface>;
        question_likes(...params: any[]): Promise<JaxModelUserInterface>;
        new_notifications(...params: any[]): Promise<JaxModelUserInterface>;
        mark_as_read_notifications(...params: any[]): Promise<JaxModelUserInterface>;
        ping(...params: any[]): Promise<JaxModelUserInterface>;
        follow_direction(...params: any[]): Promise<JaxModelUserInterface>;
        text_report(...params: any[]): Promise<JaxModelUserInterface>;
        text_report_for_fans(...params: any[]): Promise<JaxModelUserInterface>;
        video_report(...params: any[]): Promise<JaxModelUserInterface>;
        image_report(...params: any[]): Promise<JaxModelUserInterface>;
        text_or_image_or_video_report(...params: any[]): Promise<JaxModelUserInterface>;
        image_or_video_report(...params: any[]): Promise<JaxModelUserInterface>;
        text_or_video_report(...params: any[]): Promise<JaxModelUserInterface>;
        text_or_image_report(...params: any[]): Promise<JaxModelUserInterface>;
        quiz_report(...params: any[]): Promise<JaxModelUserInterface>;
        star_quiz_report(...params: any[]): Promise<JaxModelUserInterface>;
        download_file_report(...params: any[]): Promise<JaxModelUserInterface>;
        download_file_image_report(...params: any[]): Promise<JaxModelUserInterface>;
        create_order(...params: any[]): Promise<JaxModelUserInterface>;
        search_users(...params: any[]): Promise<JaxModelUserInterface>;
}
declare interface JaxModelTableInterface {
    pagination(...params: any[]): Promise<JaxModelTableInterface>;
}
declare interface JaxModelQuestionsInterface {
    list(...params: any[]): Promise<JaxModelQuestionsInterface>;
        like_toggle(...params: any[]): Promise<JaxModelQuestionsInterface>;
        ask(...params: any[]): Promise<JaxModelQuestionsInterface>;
}
declare interface JaxModelGuestInterface {
    login(...params: any[]): Promise<JaxModelGuestInterface>;
        registration(...params: any[]): Promise<JaxModelGuestInterface>;
        registration_data(...params: any[]): Promise<JaxModelGuestInterface>;
}
declare interface JaxModelCommentaryInterface {
    find(...params: any[]): Promise<JaxModelCommentaryInterface>;
        home_commentary(...params: any[]): Promise<JaxModelCommentaryInterface>;
        answer_commentary(...params: any[]): Promise<JaxModelCommentaryInterface>;
        like(...params: any[]): Promise<JaxModelCommentaryInterface>;
        home_commentary_list(...params: any[]): Promise<JaxModelCommentaryInterface>;
        commentary_childs(...params: any[]): Promise<JaxModelCommentaryInterface>;
}
declare interface Window {
    JaxModel: JaxModelInterface
    jax: JaxModelInterface
}